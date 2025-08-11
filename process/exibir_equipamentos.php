<?php
include_once('../php/config.php');

try {
    $stmt = $conn->query("SELECT * FROM equipamentos ORDER BY equipamento_id DESC");
    $equipamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar os dados: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Equipamentos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
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
            background-color: #f2f2f2;
        }

        .voltar {
            display: block;
            margin: 20px 0;
            text-align: center;
        }

        .voltar a {
            background-color: #007bff;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 5px;
        }

        .voltar a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h2>Equipamentos Cadastrados</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Localização</th>
                <th>Fabricante</th>
                <th>Modelo</th>
                <th>Série</th>
                <th>Criticidade</th>
                <th>Departamento</th>
                <th>Atribuído a</th>
                <th>Data Instalação</th>
                <th>Data Compra</th>
                <th>Garantia</th>
                <th>Custo (R$)</th>
                <th>Especificações</th>
                <th>Dados de Uso</th>
                <th>Notas</th>
                <th>Patrimônio</th>
                <th>CNPJ</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($equipamentos): ?>
                <?php foreach ($equipamentos as $equip): ?>
                    <tr>
                        <td><?= htmlspecialchars($equip['equipamento_id']) ?></td>
                        <td><?= htmlspecialchars($equip['nome_equipamento']) ?></td>
                        <td><?= htmlspecialchars($equip['tipo_equipamento']) ?></td>
                        <td><?= htmlspecialchars($equip['status']) ?></td>
                        <td><?= htmlspecialchars($equip['localizacao']) ?></td>
                        <td><?= htmlspecialchars($equip['fabricante']) ?></td>
                        <td><?= htmlspecialchars($equip['numero_modelo']) ?></td>
                        <td><?= htmlspecialchars($equip['numero_serie']) ?></td>
                        <td><?= htmlspecialchars($equip['criticidade']) ?></td>
                        <td><?= htmlspecialchars($equip['departamento']) ?></td>
                        <td><?= htmlspecialchars($equip['atribuido_a']) ?></td>
                        <td><?= htmlspecialchars($equip['data_instalacao']) ?></td>
                        <td><?= htmlspecialchars($equip['data_compra']) ?></td>
                        <td><?= htmlspecialchars($equip['data_termino_garantia']) ?></td>
                        <td><?= number_format($equip['custo_compra'], 2, ',', '.') ?></td>
                        <td><?= htmlspecialchars($equip['especificacoes']) ?></td>
                        <td><?= htmlspecialchars($equip['dados_uso']) ?></td>
                        <td><?= htmlspecialchars($equip['notas']) ?></td>
                        <td><?= htmlspecialchars($equip['patrimonio']) ?></td>
                        <td><?= htmlspecialchars($equip['cnpj_empresa']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="20">Nenhum equipamento cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="voltar">
        <a href="../insertEquipamentos.html">Cadastrar Novo Equipamento</a>
    </div>

</body>
</html>
