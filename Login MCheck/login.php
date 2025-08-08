<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['entrar']) && $_POST['entrar'] === 'entrar'){
        header("Location:../Relatórios/relatorios.html");
    }else if(isset($_POST['cadastrar']) && $_POST['cadastrar'] === 'cadastrar'){
        header("Location:../Cadastro Usuário/cadastro_usuario.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Cadastro Usuário/cadastro_usuario.php">
    <link rel="stylesheet" href="login.css">
    <title>Pagina de Login</title>
</head>
<body>
    <img src="logo.svg" alt="">
    <main>
        <form action="" method="POST">
            <h1>LOGIN</h1>

            <div class="Usuario">
                <label for="">Usuário:</label>
                <input type="text" name="usuario">
            </div>

            <div class="Senha">
                <label for="">Senha:</label>
                <input type="password" name="senha">
            </div>
            <br>

            <div class="acoes">
                <button type="submit" name="entrar" value="entrar">Entrar</button>
                <button type="submit" name="cadastrar" value="cadastrar">Cadastrar</button>
            </div>
        </form>
    </main>
</body>
</html>
