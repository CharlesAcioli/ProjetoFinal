<?php
    include_once('../php/config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
        $tipo_usuario = $_POST['tipo_usuario'];

        try {
            $check_email_stmt = $conn->prepare("SELECT COUNT(*) FROM funcionarios WHERE email = :email");
            $check_email_stmt->bindParam(':email', $email);
            $check_email_stmt->execute();
            if ($check_email_stmt->fetchColumn() > 0) {
                echo "Erro ao registrar usuário: Já existe um funcionário com este e-mail.";
                exit();
            }

            $check_cpf_stmt = $conn->prepare("SELECT COUNT(*) FROM funcionarios WHERE cpf = :cpf");
            $check_cpf_stmt->bindParam(':cpf', $cpf);
            $check_cpf_stmt->execute();
            if ($check_cpf_stmt->fetchColumn() > 0) {
                echo "Erro ao registrar usuário: Já existe um funcionário com este CPF.";
                exit();
            }

            $stmt = $conn->prepare("INSERT INTO funcionarios (nome_completo, email, cpf, senha_hash, tipo_usuario) VALUES (:nome, :email, :cpf, :senha, :tipo_usuario)");
            $stmt->bindParam(':nome', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':senha', $password);
            $stmt->bindParam(':tipo_usuario', $tipo_usuario);

            if ($stmt->execute()) {
                echo "Funcionário registrado com sucesso!";
                header("Location: ../index.html");
                exit();
            } else {
                echo "Erro ao registrar funcionário.";
            }
        } catch (PDOException $e) {
            echo "Erro ao registrar usuário: " . $e->getMessage();
        }
    }
?>