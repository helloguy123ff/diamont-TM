<?php
// Iniciar a sessão
session_start();

// Conexão com o banco de dados
$conn = new mysqli('localhost', 'usuario', 'senha', 'sistema_conta');

// Verificar se houve uma conexão bem sucedida
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Receber dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL para encontrar o usuário
$sql = "SELECT * FROM usuarios WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Verificar a senha
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        echo "Login bem sucedido!";
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}

// Fechar conexão com o banco de dados
$conn->close();
?>
