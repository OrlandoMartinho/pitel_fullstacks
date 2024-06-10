<?php  
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Se o usuário não estiver logado, redirecionar para a página de login
    header("Location: login.html");
    exit();
}


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
                    <li  class="active-menu"><a href="home.html">Home</a></li>
                    <li><a href="reservations.html">Reservas</a></li>
                    <li><a href="contacts.html">Contactos</a></li>
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
                <div class="notification-content">
                    <p>12/3/2043</p>
                    <p>Orlando Saiombo é mau eu lhe...</p>
                </div>
                <div class="notification-content">
                    <p>12/3/2043</p>
                    <p>Orlando Saiombo é mau eu lhe...</p>
                </div>
                <div class="notification-content">
                    <p>12/3/2043</p>
                    <p>Orlando Saiombo é mau eu lhe...</p>
                </div>
                <div class="notification-content">
                    <p>12/3/2043</p>
                    <p>Orlando Saiombo é mau eu lhe...</p>
                </div>
                <div class="notification-content">
                    <p>12/3/2043</p>
                    <p>Orlando Saiombo é mau eu lhe...</p>
                </div>
            </div>
            <div class="main-information">
                <h1>Estado Geral</h1>
            </div>
            <div class="cards">
                <div class="card">
                    <p class="color-card">10</p>
                    <p>Reservas</p>
                </div>
                <div class="card">
                    <p class="color-card">10</p>
                    <p>Contactos</p>
                </div>
                <div class="card">
                    <p class="color-card">10</p>
                    <p>Total</p>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/home.js"></script>
</body>
<script>
    window.addEventListener('load', function() {
      setTimeout(function() {
        document.querySelector('.loader-container').style.display = 'none';
      }, 500); 
    });
    </script>
</html>