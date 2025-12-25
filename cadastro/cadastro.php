<?php
require "conexao.php";

$usuario = $_POST["usuario"];
$email   = $_POST["email"];
$senha   = $_POST["senha"];

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, email, senha)
        VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $usuario, $email, $senhaHash);

if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar.";
}
