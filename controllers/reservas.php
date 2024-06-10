<?php
include '../config/conection.php';

function cadastrarReservas($conn) {
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

        include '../public/pages/cadastro.php';
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

function obterTodasReservas($conn) {
    $sql = "SELECT * FROM reservas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $reservas = [];
        while($row = $result->fetch_assoc()) {
            $reservas[] = $row;
        }
        return $reservas;
    } else {
        return [];
    }
}

function apagarReserva($conn, $id_reserva) {
    // Preparar e executar a query de exclusão
    $sql = "DELETE FROM reservas WHERE id_reserva = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_reserva);

    if ($stmt->execute()) {
        echo "Reserva apagada com sucesso!";
    } else {
        echo "Erro ao apagar a reserva: " . $conn->error;
    }
}

function editarReserva($conn, $id_reserva) {
    // Preparar e executar a query de atualização
    $sql = "UPDATE reservas SET atendido = 1 WHERE id_reserva = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_reserva);

    if ($stmt->execute()) {
        echo "Atributo 'atendido' marcado como 1 para a reserva com ID $id_reserva.";
    } else {
        echo "Erro ao marcar o atributo 'atendido': " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    obterTodasReservas($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    cadastrarReservas($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // Obter os dados do corpo da solicitação
    parse_str(file_get_contents("php://input"), $_DELETE);
    // Verificar se foi fornecido um ID válido
    if (isset($_DELETE['id_reserva']) && is_numeric($_DELETE['id_reserva'])) {
        // Chama a função para apagar a reserva
        apagarReserva($conn, $_DELETE['id_reserva']);
    } else {
        echo "ID de reserva inválido.";
    } 
}

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    // Obter os dados do corpo da solicitação
    parse_str(file_get_contents("php://input"), $_PUT);
    // Verificar se foi fornecido um ID válido
    if (isset($_PUT['id_reserva']) && is_numeric($_PUT['id_reserva'])) {
        // Chama a função para editar a reserva
        editarReserva($conn, $_PUT['id_reserva']);
    } else {
        echo "ID de reserva inválido.";
    }
}

$conn->close();
?>
