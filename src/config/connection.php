<?php
// Configurações do banco de dados
$servername = "localhost"; // Host do banco de dados
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "pitel_bd"; // Nome do banco de dados

try {
    // Cria uma nova conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Define o modo de erro do PDO para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Em caso de erro na conexão, exibe a mensagem de erro
    echo "Falha na conexão: " . $e->getMessage();
}
?>
