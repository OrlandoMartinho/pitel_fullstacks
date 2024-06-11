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

    // Conexão
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verificar conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Função para obter o total de reservas
function obterTotalReservas($conn) {
    $sql = "SELECT * FROM reservas";
    $result = $conn->query($sql);
    $reservas = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $reservas[] = $row;
        }
    }

    return $reservas;
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

// Obter todas as notificações
$notificacoes = obterTodasNotificacoes($conn);

// Obter todas as reservas
$reservas = obterTotalReservas($conn);

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="../css/reservetions.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="shortcut icon" href="../assets/icon/logo.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="menu">
            <nav>
                <a href="#" class="logo"><img src="../assets/icon/user.png" alt=""></a>
                <ul>
                    <li class="home"><a href="home.php">Home</a></li>
                    <li class="active-menu"><a href="reservations.php">Reservas</a></li>
                    <li><a href="contacts.php">Contactos</a></li>
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
                <h1>Reservas</h1>
            </div>
            <div class="container-table">
                <table>
                    <thead>
                        <tr>
                            <th class="spaccing">Nome</th>
                            <th class="spaccing">Data</th>
                            <th class="spaccing">Hora</th>
                            <th class="spaccing">Pessoas</th>
                            <th class="spaccing">Aprovado</th>
                            <th class="spaccing">Email</th>
                            <th class="actions">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservas as $reserva): ?>
                        <tr>
                            <td><?php echo $reserva['nome_completo']; ?></td>
                            <td><?php echo $reserva['data_da_reserva']; ?></td>
                            <td><?php echo $reserva['hora']; ?></td>
                            <td><?php echo $reserva['total_de_pessoas']; ?></td>
                            <td><?php echo $reserva['atendido']; ?></td>
                            <td><?php echo $reserva['email']; ?></td>
                            <td class="buttons">
                                <button onclick="aprovarReserva(<?php echo $reserva['id_reserva']; ?>)">Aprovar</button>
                                <button onclick="excluirReserva(<?php echo $reserva['id_reserva']; ?>)">Eliminar</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('pesquisa').addEventListener('input', function() {
            var filtro = this.value.toLowerCase();
            var linhas = document.querySelectorAll('.container-table tbody tr');
            var i=0
            linhas.forEach(function(linha) {
                var nome = linha.querySelector('td:nth-child(1)').innerText.toLowerCase();
                var data = linha.querySelector('td:nth-child(2)').innerText.toLowerCase();
                var hora = linha.querySelector('td:nth-child(3)').innerText.toLowerCase();
                var pessoas = linha.querySelector('td:nth-child(4)').innerText.toLowerCase();
                var aprovado = linha.querySelector('td:nth-child(5)').innerText.toLowerCase();
                var email = linha.querySelector('td:nth-child(6)').innerText.toLowerCase();

                if (nome==filtro || data==filtro || hora==filtro || pessoas==filtro || aprovado==filtro || email==filtro ||filtro == i) {
                    linha.style.display = '';
                }
                else {
                    linha.style.display = 'none';
                }

                i=i+1
            });
        });
    </script>
    <script src="../js/reservations.js"></script>
</body>
</html>
