<?php
include_once('../php/config.php');

try {
    // Consulta para buscar todos os funcionários
    $stmt = $conn->query("SELECT * FROM funcionarios ORDER BY funcionario_id DESC");
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar os dados: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Funcionários Cadastrados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            padding: 10px 15px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .voltar {
            margin-top: 20px;
            text-align: center;
        }

        .voltar a {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .voltar a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h2>Funcionários Cadastrados</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Completo</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Tipo de Usuário</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($funcionarios): ?>
                <?php foreach ($funcionarios as $func): ?>
                    <tr>
                        <td><?= htmlspecialchars($func['funcionario_id']) ?></td>
                        <td><?= htmlspecialchars($func['nome_completo']) ?></td>
                        <td><?= htmlspecialchars($func['email']) ?></td>
                        <td><?= htmlspecialchars($func['cpf']) ?></td>
                        <td><?= htmlspecialchars($func['telefone_celular']) ?></td>
                        <td><?= htmlspecialchars($func['tipo_usuario']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Nenhum funcionário cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="voltar">
        <a href="../insertFuncionarios.html">Cadastrar Novo Funcionário</a>
    </div>

</body>
</html>
