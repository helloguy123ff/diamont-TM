<?php
// Conexão com o banco de dados
$conn = new mysqli('localhost', 'usuario', 'senha', 'sistema_conta');

// Verificar se houve uma conexão bem sucedida
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Receber consulta da URL
$consulta = $_GET['consulta'];

// Consulta SQL para buscar resultados
$sql = "SELECT * FROM resultados WHERE resultado LIKE '%$consulta%'";
$result = $conn->query($sql);

// Exibir resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row['resultado'] . "</p>";
    }
} else {
    echo "Nenhum resultado encontrado!";
}

// Fechar conexão com o banco de dados
$conn->close();
?>
