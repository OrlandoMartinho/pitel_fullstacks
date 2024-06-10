<?php
session_start();
include '../config/conection.php'; // arquivo que contém as informações de conexão com o banco de dados

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se o email e senha foram fornecidos
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        // Verificar as credenciais no banco de dados
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE senha = ? AND email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $senha, $email); // corrigido para "ss"
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Login bem-sucedido, definir variáveis de sessão e redirecionar
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $email;
            header("Location: ../public/pages/home.html");
            exit();
        } else {
            echo "Email de usuário ou senha incorretos. Por favor, tente novamente.";
        }
    } else {
        echo "Por favor, forneça um email e senha.";
    }
}
?>
