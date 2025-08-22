<?php
include_once('../php/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $id = $_POST['funcionario_id'];
        $nome_completo = $_POST['nome_completo'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $telefone_celular = $_POST['telefone_celular'];

        $sql = "UPDATE funcionarios SET 
                nome_completo = :nome_completo,
                email = :email,
                cpf = :cpf,
                telefone_celular = :telefone_celular
                WHERE funcionario_id = :id";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome_completo', $nome_completo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':telefone_celular', $telefone_celular);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $_SESSION['username'] = $nome_completo;
        $_SESSION['email'] = $email;
        $_SESSION['telefone'] = $telefone_celular;
        $_SESSION['cpf'] = $cpf;
        
        header('Location: ../perfil/perfil.php');
        exit();

    } catch (PDOException $e) {
        header('Location: exibir_funcionarios.php?status=error_edit');
        exit();
    }
}
?>