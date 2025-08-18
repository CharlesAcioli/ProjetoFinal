<?php
include_once('../php/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha_hash = $_POST['senha_hash'];
    $telefone = $_POST['telefone'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $cargo = $_POST['cargo'];
    $setor = $_POST['setor'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    
    try {
        $stmt = $conn->prepare("INSERT INTO funcionarios (nome_completo, email, cpf, telefone_celular, senha_hash, tipo_usuario, cargo, setor, endereco, bairro, cep) VALUES (:nome, :email, :cpf, :telefone, :senha_hash, :tipo_usuario, :cargo, :setor, :endereco, :bairro, :cep)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
        $hashed_senha = password_hash($senha_hash, PASSWORD_DEFAULT);
        $stmt->bindParam(':senha_hash', $hashed_senha);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':setor', $setor);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam('cep', $cep);
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