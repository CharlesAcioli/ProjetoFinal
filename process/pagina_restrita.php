<?php
session_start();

// Verifica se a sessão 'loggedin' não está definida ou não é true
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Restrita</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Esta é uma área restrita para usuários logados.</p>
    <a href="logout.php">Sair</a>
</body>
</html>