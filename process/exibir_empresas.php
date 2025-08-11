<?php
include_once('../php/config.php');

try {
    $stmt = $conn->prepare("SELECT * FROM empresas");
    $stmt->execute();
    $empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['empresas_globais'] = $empresas;
    
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Empresas Cadastradas</h1>

    <?php
    if (isset($_SESSION['empresas_globais']) && !empty($_SESSION['empresas_globais'])) {
        $empresas = $_SESSION['empresas_globais'];
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
        <a href="../insertEmpresas.html">Cadastrar Nova Empresa</a>
    </div>
</body>
</html>