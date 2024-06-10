<?php
include '../config/conection.php';


function processReservation($conn) {
    
        // Sanitiza e coleta os dados do formulário
    $nome = $conn->real_escape_string($_POST['nome']);
    $data = $conn->real_escape_string($_POST['data']);
    $hora = $conn->real_escape_string($_POST['hora']);
    $pessoas = $conn->real_escape_string($_POST['pessoas']);
    $email = $conn->real_escape_string($_POST['email']);

        // Monta a query SQL
    $sql = "INSERT INTO reservas (nome, data, hora, pessoas, email) VALUES ('$nome', '$data', '$hora', '$pessoas', '$email')";

        // Executa a query e verifica o resultado
    if ($conn->query($sql) === TRUE) {
        echo "Reserva feita com sucesso!";
    } else {
         echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    
}






if ($_SERVER["REQUEST_METHOD"] == "POST") {
    processReservation($conn);
}



$conn->close();
?>
