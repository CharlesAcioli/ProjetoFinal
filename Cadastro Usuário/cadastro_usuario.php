<?php 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['sair']) && $_POST['sair'] === 'sair'){
        header("Location:../Login MCheck/login.php");
        exit();
    }
    
    if(isset($_POST['cadastrar']) && $_POST['cadastrar'] === 'cadastrar'){
        header("Location:cadastrar_usuario.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="cadastro_usuario.css">
    <title>Cadastro Funcionário</title>
</head>
<body>
    <header>
        <img src="logo.svg" alt="">
    </header>
    <form action="../process/insertFuncionario.php" method="post">
        <h1>Cadastro Funcionário</h1><br><br>
        <label for="">NOME COMPLETO:</label>
        <input type="text" name="nome" placeholder="Informe seu nome completo" required><br>
        <label for="">ENDEREÇO:</label>
        <input type="text" name="endereco" placeholder="Informe seu endereço" required><br>
        <label for="">BAIRRO:</label>
        <input type="text" name="bairro" placeholder="Informe o bairro que corresponde ao seu endereço" required><br>
        <label for="">CEP:</label>
        <input type="text" name="cep" placeholder="Informe o CEP referente a sua residência" required><br>
        <label for="">TELEFONE:</label>
        <input type="tel" name="telefone" placeholder="Informe seu número de telefone" required><br>
        <label for="">CPF:</label>
        <input type="text" name="cpf" id="" placeholder="Informe apenas os números do seu CPF" required><br>
        <label for="">EMAIL:</label>
        <input type="email" name="email" placeholder="Informe o seu Email" required><br>
        <label for="">CONFIRME O EMAIL:</label>
        <input type="email" name="confirme_email" placeholder="Confirme o email informado" required><br>
        <label for="">SENHA:</label>
        <input type="password" name="senha_hash" placeholder="Digite a sua senha" required><br>
        <label for="">CONFIRMAÇÃO DE SENHA:</label>
        <input type="password" name="confirme_senha" placeholder="Confirme sua senha" required><br>
        <label for="">TIPO DE USUÁRIO:</label>
        <select name="tipo_usuario" id="" required>
            <option value="Master">Master</option>
            <option value="Líder">Líder</option>
            <option value="Comum">Comum</option>
        </select><br>
        <label for="">CARGO OCUPANTE:</label>
        <select name="cargo" id="" required>
            <option value="Administrador">Administrador</option>
            <option value="Diretor">Diretor</option>
            <option value="Gerente">Gerente</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Funcionario">Funcionario</option>
            <option value="Tecnico">Tecnico</option>
        </select><br>
        <label for="setor">SETOR:</label>
        <input type="text" name="setor" placeholder="Confirme seu setor" required><br>
        <br><br>
        <button type="submit" name="cadastrar" value="cadastrar">Cadastar</button><br>
        <button type="submit" name="sair" value="sair">Sair</button>
    </form>
    <footer>&copy;MCheck</footer>
</body>
</html>