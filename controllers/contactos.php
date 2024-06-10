<?php
include '../config/conection.php';

// Exemplo de consulta ao banco de dados
$sql = "SELECT * FROM contatos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Saída dos dados de cada linha
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Fechar a conexão
$conn->close();
?>
