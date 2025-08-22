<?php
include_once('../php/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $id = $_POST['funcionario_id'];
        $nome_completo = $_POST['nome_completo'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $telefone_celular = $_POST['telefone_celular'];
        $tipo_usuario = $_POST['tipo_usuario'];

        $sql = "UPDATE funcionarios SET 
                nome_completo = :nome_completo,
                email = :email,
                cpf = :cpf,
                telefone_celular = :telefone_celular,
                tipo_usuario = :tipo_usuario
                WHERE funcionario_id = :id";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome_completo', $nome_completo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':telefone_celular', $telefone_celular);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        header('Location: exibir_funcionarios.php?status=success_edit');
        exit();

    } catch (PDOException $e) {
        header('Location: exibir_funcionarios.php?status=error_edit');
        exit();
    }
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE funcionario_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$funcionario) {
            header('Location: exibir_funcionarios.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar os dados do funcionário: " . $e->getMessage();
        exit();
    }
} else {
    header('Location: exibir_funcionarios.php');
    exit();
}
?>