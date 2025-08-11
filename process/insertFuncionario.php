<?php
include_once('../php/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha_hash = $_POST['senha_hash'];
    $telefone = $_POST['telefone'];
    $tipo_usuario = $_POST['tipo_usuario'];

    try {
        $stmt = $conn->prepare("INSERT INTO funcionarios (nome_completo, email, cpf, telefone_celular, senha_hash, tipo_usuario) VALUES (:nome, :email, :cpf, :telefone, :senha_hash, :tipo_usuario)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
        $hashed_senha = password_hash($senha_hash, PASSWORD_DEFAULT);
        $stmt->bindParam(':senha_hash', $hashed_senha);     
        if ($stmt->execute()) {
            header("Location: exibir_funcionarios.php");
            exit();
        } else {
            echo "Erro ao registrar a empresa.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>