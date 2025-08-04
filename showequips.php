<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'mcheck';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}

try {
    $stmt = $conn->prepare("SELECT * FROM equipamentos ORDER BY equipamento_id DESC");
    $stmt->execute();

    $equipamentos = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erro ao buscar equipamentos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Equipamentos</title>
</head>

<body>

    <h1>Equipamentos Registrados</h1>

    <?php if ($equipamentos): ?>
        <table>
            <thead>
                <tr>
                    <?php foreach (array_keys($equipamentos[0]) as $coluna): ?>
                        <th><?php echo htmlspecialchars(str_replace('_', ' ', ucfirst($coluna))); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipamentos as $equipamento): ?>
                    <tr>
                        <?php foreach ($equipamento as $valor): ?>
                            <td><?php echo htmlspecialchars($valor); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-data">Nenhum equipamento encontrado no banco de dados.</p>
    <?php endif; ?>
</body>
</html>