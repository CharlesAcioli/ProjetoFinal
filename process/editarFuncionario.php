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

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f8; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], select {
            width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;
        }
        button[type="submit"]:hover { background-color: #0056b3; }
        a.btn-cancelar { background-color: #6c757d; color: white; padding: 10px 15px; border-radius: 4px; text-decoration: none; margin-left: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Funcionário</h2>
        <form action="editarFuncionario.php" method="POST">
            <input type="hidden" name="funcionario_id" value="<?= htmlspecialchars($funcionario['funcionario_id']) ?>">

            <div class="form-group">
                <label for="nome_completo">Nome Completo</label>
                <input type="text" name="nome_completo" value="<?= htmlspecialchars($funcionario['nome_completo']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($funcionario['email']) ?>" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" value="<?= htmlspecialchars($funcionario['cpf']) ?>" required>
            </div>

            <div class="form-group">
                <label for="telefone_celular">Telefone</label>
                <input type="text" name="telefone_celular" value="<?= htmlspecialchars($funcionario['telefone_celular']) ?>">
            </div>


            <button type="submit">Salvar Alterações</button>
            <a href="exibir_funcionarios.php" class="btn-cancelar">Cancelar</a>
        </form>
    </div>
</body>
</html>