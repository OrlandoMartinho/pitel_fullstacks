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
                    <input type="text" name="" id="" placeholder="Pesquisar">
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
                <h1>Reservas</h1>
            </div>
            <div class="container-table">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th class="spaccing">Data</th>
                            <th>Hora</th>
                            <th>Total</th>
                            <th class="spaccing">Email</th>
                            <th class="actions">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>




                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>

                                                <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Saimbo</td>
                            <td>12/03/2000</td>
                            <td>18:16</td>
                            <td>50</td>
                            <td>srsaimbo@gmail.com</td>
                            <td class="buttons">
                                <button>Aprovar</button>
                                <button>Eliminar</button>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../js/reservations.js"></script>
</body>
</html>