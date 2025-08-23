<?php
include_once('../php/config.php');
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
        <form action="editarFuncionarioFIM.php" method="POST">
            <input type="hidden" name="funcionario_id" value="<?= htmlspecialchars($_SESSION['user_id']) ?>">

            <div class="form-group">
                <label for="nome_completo">Nome Completo</label>
                <input type="text" name="nome_completo" value="<?= htmlspecialchars($_SESSION['username']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($_SESSION['email']) ?>" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" value="<?= htmlspecialchars($_SESSION['cpf']) ?>" required>
            </div>

            <div class="form-group">
                <label for="telefone_celular">Telefone</label>
                <input type="text" name="telefone_celular" value="<?= htmlspecialchars($_SESSION['telefone']) ?>">
            </div>


            <button type="submit">Salvar Alterações</button>
            <a href="exibir_funcionarios.php" class="btn-cancelar">Cancelar</a>
        </form>
    </div>
</body>
</html>