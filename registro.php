<?php
// Conexão com o banco de dados
$conn = new mysqli('localhost', 'usuario', 'senha', 'sistema_conta');

// Verificar se houve uma conexão bem sucedida
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Receber dados do formulário
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Inserir dados no banco de dados
$sql = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Usuário registrado com sucesso!";
} else {
    echo "Erro ao registrar usuário: " . $conn->error;
}

// Fechar conexão com o banco de dados
$conn->close();
?>
