<?php
include_once('../php/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cnpj = $_POST['cnpj'];
    $razao = $_POST['Razao'];
    $fantasia = $_POST['Fantasia'];
    $inscricao = $_POST['Estadual'];
    $segmento = $_POST['Segmento'];
    $pro_ser = $_POST['Produtos'];
    $email = $_POST['Email'];
    $senha = $_POST['senha_hash'];

    try {
        $stmt = $conn->prepare("INSERT INTO empresas (cnpj, razao_social, nome_fantasia, inscricao_estadual, segmento, produtos_servicos, email_contato, senha_hash) VALUES (:cnpj, :razao, :fantasia, :inscricao, :segmento, :pro_ser, :email, :senha)");
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':razao', $razao);
        $stmt->bindParam(':fantasia', $fantasia);
        $stmt->bindParam(':inscricao', $inscricao);
        $stmt->bindParam(':segmento', $segmento);
        $stmt->bindParam(':pro_ser', $pro_ser);
        $stmt->bindParam(':email', $email);
        $hashed_senha = password_hash($senha, PASSWORD_DEFAULT);
        $stmt->bindParam(':senha', $hashed_senha);
        
        if ($stmt->execute()) {
            header("Location: exibir_empresas.php");
            exit();
        } else {
            echo "Erro ao registrar a empresa.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>