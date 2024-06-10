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

// Função para obter o total de reservas
function obterTotalReservas($conn) {
    $sql = "SELECT COUNT(*) as total FROM reservas";
    $result = $conn->query($sql);
    return $result->fetch_assoc()['total'];
}

// Função para obter o total de contatos
function obterTotalContatos($conn) {
    $sql = "SELECT COUNT(*) as total FROM contatos";
    $result = $conn->query($sql);
    return $result->fetch_assoc()['total'];
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

// Obter o total de reservas
$totalReservas = obterTotalReservas($conn);

// Obter o total de contatos
$totalContatos = obterTotalContatos($conn);

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
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="shortcut icon" href="../assets/icon/logo.png" type="image/x-icon">
</head>
<body>
    <div class="loader-container">
        <img src="../assets/img/loader.gif" alt="Loader" class="loader">
    </div>
    <div class="container">
        <div class="menu">
            <nav>
                <a href="#" class="logo"><img src="../assets/icon/user.png" alt=""></a>
                <ul>
                    <li class="active-menu"><a href="home.php">Home</a></li>
                    <li><a href="reservations.php">Reservas</a></li>
                    <li><a href="contacts.php">Contactos</a></li>
                    <li><a href="login.html">Sair</a></li>
                </ul>
            </nav>
        </div>
        <div class="main">
            <div class="notification-icon">
                <img src="../assets/icon/notification.png" alt="">
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
                <h1>Estado Geral</h1>
            </div>
            <div class="cards">
                <div class="card">
                    <p class="color-card"><?php echo $totalReservas; ?></p>
                    <p>Reservas</p>
                </div>
                <div class="card">
                    <p class="color-card"><?php echo $totalContatos; ?></p>
                    <p>Contactos</p>
                </div>
                <div class="card">
                    <p class="color-card"><?php echo ($totalReservas + $totalContatos); ?></p>
                    <p>Total</p>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/home.js"></script>
    <script src="../api/index.js"></script>
</body>
<script>
    window.addEventListener('load', function() {
      setTimeout(function() {
        document.querySelector('.loader-container').style.display = 'none';
      }, 500); 
    });
</script>
</html>
