<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['entrar']) && $_POST['entrar'] === 'entrar'){
        header("Location:../Relatórios/relatorios.php");
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
    <link rel="stylesheet" href="login.css">
    <title>Pagina de Login</title>
</head>
<body>
    <img src="logo.svg" alt="">
    <main>
        <form action="../process/processar_login.php" method="post">
            <h1>LOGIN</h1>

            <div class="Usuario">
                <label for="usuario">Usuário:</label>
                <input type="text" name="usuario" placeholder="Informe o usuário">
            </div>

            <div class="Senha">
                <label for="senha">Senha:</label>
                <input type="password" placeholder="Digite sua senha" name="senha">
            </div>
            <br>

            <div class="acoes">
                <button type="submit" name="entrar" value="entrar">Login</button>
                <button windown.href.location="../insertFuncionarios.html" type="submit" name="" value="">Cadastrar</button>
            </div>
        </form>
    </main>

</body>
</html>
