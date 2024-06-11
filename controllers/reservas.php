<?php
include '../config/conection.php';

function cadastrarReservas($conn) {
    // Verifica se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        // Se não forem, encerre a função
        return;
    }
    
    // Sanitiza e coleta os dados do formulário
    $nome = $conn->real_escape_string($_POST['nome']);
    $data = $conn->real_escape_string($_POST['data']);
    $hora = $conn->real_escape_string($_POST['hora']);
    $pessoas = $conn->real_escape_string($_POST['pessoas']);
    $email = $conn->real_escape_string($_POST['email']);

    // Monta a query SQL para inserir a reserva
    $sql = "INSERT INTO reservas (nome_completo, data_da_reserva, hora, total_de_pessoas, email) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $nome, $data, $hora, $pessoas, $email);

    // Executa a query e verifica o resultado
    if ($stmt->execute()) {
        // Insere uma notificação sobre a nova reserva
        $descricao = "Nova reserva recebida de $nome no dia $data às $hora para $pessoas pessoas.";
        $sql_notificacao = "INSERT INTO notificacoes (descricao) VALUES (?)";
        $stmt_notificacao = $conn->prepare($sql_notificacao);
        $stmt_notificacao->bind_param("s", $descricao);
        $stmt_notificacao->execute();

        // Redireciona de volta para a página de cadastro
        header("Location: ../public/pages/cadastro.php");
        exit(); // Encerra a execução do script após o redirecionamento
    } else {
        // Se ocorrer um erro, exibe uma mensagem de erro
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

function obterTodasReservas($conn) {
    // Monta a query SQL para obter todas as reservas
    $sql = "SELECT * FROM reservas";
    $result = $conn->query($sql);

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        $reservas = [];
        while($row = $result->fetch_assoc()) {
            $reservas[] = $row;
        }
        return $reservas; // Retorna o array de reservas
    } else {
        return []; // Retorna um array vazio se não houver reservas
    }
}

function excluirReserva($conn, $id_reserva) {
    // Monta a query SQL para excluir a reserva com o ID fornecido
    $sql = "DELETE FROM reservas WHERE id_reserva = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_reserva);
    
    // Executa a query e retorna true se for bem-sucedida, ou false se houver erro
    return $stmt->execute();
}

function editarReserva($conn, $id_reserva) {
    // Monta a query SQL para marcar a reserva como atendida
    $sql = "UPDATE reservas SET atendido = ? WHERE id_reserva = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i","Sim",$id_reserva);
    
    // Executa a query e retorna true se for bem-sucedida, ou false se houver erro
    return $stmt->execute();
}

// Verifica o método da requisição HTTP
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Se for GET, obtém todas as reservas
    $reservas = obterTodasReservas($conn);
    // Retorna os dados em formato JSON
    echo json_encode($reservas);
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Se for POST, cadastra uma nova reserva
    cadastrarReservas($conn);
} elseif ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    // Se for DELETE, exclui a reserva com o ID fornecido
    parse_str(file_get_contents("php://input"), $data);
    $id_reserva = $data['id_reserva'];
    $resultado = excluirReserva($conn, $id_reserva);
    // Retorna o resultado da operação em formato JSON
    echo json_encode(["success" => $resultado]);
} elseif ($_SERVER["REQUEST_METHOD"] === "PUT") {
    // Se for PUT, marca a reserva com o ID fornecido como atendida
    parse_str(file_get_contents("php://input"), $data);
    $id_reserva = $data['id_reserva'];
    $resultado = editarReserva($conn, $id_reserva);
    // Retorna o resultado da operação em formato JSON
    echo json_encode(["success" => $resultado]);
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
