<?php
include '../config/conection.php';

function cadastrarContatos($conn) {
    // Sanitiza e coleta os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Monta a query SQL
    $sql = "INSERT INTO contatos (nome, email, mensagem) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $mensagem);

    if ($stmt->execute()) {
        // Adiciona notificação
        $descricao = "Novo contato recebido do email " . $email;
        $sql2 = "INSERT INTO notificacoes (descricao) VALUES (?)";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("s", $descricao);
        $stmt2->execute();

        include '../public/pages/cadastro.php';
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

function obterTodosContatos($conn) {
    $sql = "SELECT * FROM contatos";
    $result = $conn->query($sql);

    $contatos = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $contatos[] = $row;
        }
    }

    // Define o cabeçalho Content-Type para JSON
    header('Content-Type: application/json');
    echo json_encode($contatos);
}

function apagarContato($conn, $id_contato) {
    // Preparar e executar a query de exclusão
    $sql = "DELETE FROM contatos WHERE id_contato = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_contato);

    if ($stmt->execute()) {
        echo "Contato apagado com sucesso!";
        exit(); // Encerra a execução após a exclusão
    } else {
        echo "Erro ao apagar o contato: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    obterTodosContatos($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    cadastrarContatos($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // Obter os dados do corpo da solicitação
    parse_str(file_get_contents("php://input"), $_DELETE);
    // Verificar se foi fornecido um ID válido
    if (isset($_DELETE['id_contato']) && is_numeric($_DELETE['id_contato'])) {
        // Chama a função para apagar o contato
        apagarContato($conn, $_DELETE['id_contato']);
    } else {
        echo "ID de contato inválido.";
    } 
}

$conn->close();
?>
