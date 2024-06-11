<?php  
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Se o usuário não estiver logado, redirecionar para a página de login
    header("Location: login.html");
    exit();
}

// Função para conectar ao banco de dados
function conectarAoBanco() {
    $servername = "localhost";  
    $username = "root";         
    $password = "";             
    $dbname = "pitel_bd";  

    return new mysqli($servername, $username, $password, $dbname);
}

// Função para obter o total de contatos
function obterTodosContatos($conn) {
    $sql = "SELECT * FROM contatos";
    $result = $conn->query($sql);
    $contatos = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $contatos[] = $row;
        }
    }

    return $contatos;
}

// Função para obter todas as notificações
function obterTodasNotificacoes($conn) {
    $sql = "SELECT * FROM notificacoes";
    $result = $conn->query($sql);
    $notificacoes = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $notificacoes[] = $row;
        }
    }

    return $notificacoes;
}

// Conectar ao banco de dados
$conn = conectarAoBanco();

// Obter o total de contatos
$todosContatos = obterTodosContatos($conn);

// Obter todas as notificações
$notificacoes = obterTodasNotificacoes($conn);

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="../css/contacts.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="shortcut icon" href="../assets/icon/logo.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="menu">
            <nav>
                <a href="#" class="logo"><img src="../assets/icon/user.png" alt=""></a>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="reservations.php">Reservas</a></li>
                    <li class="active-menu"><a href="contacts.php">Contactos</a></li>
                    <li><a href="login.html">Sair</a></li>
                </ul>
            </nav>
        </div>
        <div class="main">
            <div class="main-header">
                <div class="search">
                    <input type="text" name="" id="pesquisa" placeholder="Pesquisar">
                    <img src="../assets/icon/search.png" alt="">
                </div>
                <div class="notification-icon">
                    <img src="../assets/icon/notification.png" alt="">
                </div>
            </div>
            <div class="notification">
                <div class="title">
                    <p>Notificações</p>
                    <img class="notification-close" src="../assets/icon/X.png" alt="">
                </div>
                <?php foreach ($notificacoes as $notificacao): ?>
                <div class="notification-content">
                    <p><?php echo $notificacao['data_da_notificacao']; ?></p>
                    <p><?php echo $notificacao['descricao']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="main-information">
                <h1>Contactos</h1>
            </div>
            <div class="messages">
            <div class="messages-list" slyle="width: 30vw;">
                <?php foreach ($todosContatos as $mensagem): ?>
                <div class="messages-container" data-email="<?php echo strtolower($mensagem['email']); ?>" data-message="<?php echo strtolower($mensagem['mensagem']); ?>" onclick="mostrarMensagem('<?php echo $mensagem['mensagem']; ?>', '<?php echo $mensagem['email']; ?>', '<?php echo $mensagem['data_do_contato']; ?>')">
                    <div>
                        <p class="title-messages"><?php echo $mensagem['email']; ?></p>
                        <p><?php echo $mensagem['mensagem']; ?></p>
                    </div>
                    <span class="active"><img src="../assets/icon/icons8_delete_bin.svg" alt="" style="width: 20px;margin:5.3px;z-index: 100;" onclick="excluirContato(<?php echo $mensagem['id_contato']; ?>)" ></span>
                </div>
                <?php endforeach; ?>
            </div>


                <div class="chat">
                   <div class="container-chat">
                    
                    <div class="content">
                        <p class="title-messages"></p>
                        <p class="date-send-message"></p>
                        <p class="messagecontent"></p>
                    </div>

                   </div>
                   <form action="">
                    <div>
                        <textarea name="" id=""></textarea>
                    </div>
                        <button>Enviar</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('pesquisa').addEventListener('input', function() {
        var filtro = this.value.toLowerCase();
        var containers = document.querySelectorAll('.messages-container');

        containers.forEach(function(container) {
            var email = container.getAttribute('data-email');
            var message = container.getAttribute('data-message');

            if (email.includes(filtro) || message.includes(filtro)) {
                container.style.display = '';
            } else {
                container.style.display = 'none';
            }
        });
    });
</script>

    <script src="../js/contacts.js"></script>
</body>
</html>
