<?php
include_once('../php/config.php');

try {
    $stmt = $conn->prepare("SELECT * FROM empresas");
    $stmt->execute();
    $empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar os dados: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empresas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
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

        .btn-acao {
            padding: 5px 10px;
            margin: 0 2px;
            text-decoration: none;
            border-radius: 3px;
            color: white;
        }

        .btn-editar {
            background-color: #ffc107;
        }

        .btn-excluir {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

    <h1>Empresas Cadastradas</h1>

    <?php
    if ($empresas) {
    ?>
    
    <table>
        <thead>
            <tr>
                <th>CNPJ</th>
                <th>Razão Social</th>
                <th>Nome Fantasia</th>
                <th>Inscrição Estadual</th>
                <th>Segmento</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($empresas as $empresa) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($empresa['cnpj']) . "</td>";
                echo "<td>" . htmlspecialchars($empresa['razao_social']) . "</td>";
                echo "<td>" . htmlspecialchars($empresa['nome_fantasia']) . "</td>";
                echo "<td>" . htmlspecialchars($empresa['inscricao_estadual']) . "</td>";
                echo "<td>" . htmlspecialchars($empresa['segmento']) . "</td>";
                echo "<td>" . htmlspecialchars($empresa['email_contato']) . "</td>";
                echo "<td>";
                echo "<a href='editarEmpresa.php?cnpj=" . htmlspecialchars($empresa['cnpj']) . "' class='btn-acao btn-editar'>Editar</a>";
                echo "<a href='excluirEmpresa.php?cnpj=" . htmlspecialchars($empresa['cnpj']) . "' class='btn-acao btn-excluir' onclick='return confirm(\"Tem certeza que deseja excluir esta empresa?\");'>Excluir</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    } else {
        echo "<p>Nenhuma empresa encontrada ou os dados não foram carregados.</p>";
    }
    ?>
    <div class="voltar">
        <a href="../Login MCheck/Cadastro MCheck/cadastroEmpresa.php">Cadastrar Nova Empresa</a>
    </div>
</body>
</html>