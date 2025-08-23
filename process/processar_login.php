<?php 
    require_once('../php/config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        try{
        $sql = "SELECT funcionario_id, nome_completo, senha_hash, email, telefone_celular, cpf, cargo, setor
        FROM funcionarios
        WHERE nome_completo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['senha_hash'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $user['funcionario_id'];
                $_SESSION['username'] = $user['nome_completo'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['telefone'] = $user['telefone_celular'];
                $_SESSION['cpf'] = $user['cpf'];
                $_SESSION['cargo'] = $user['cargo'];
                $_SESSION['setor'] = $user['setor'];
            
                header("Location: ../Perfil/perfil.php");
                exit;
            } else {
                $_SESSION['erro_login'] = "Nome de usuário ou senha inválidos.";
                header("Location: login.html");
                exit();
            }
        }catch (PDOException $e) {
                echo "Erro ao acessar o banco de dados: " . $e->getMessage();
                exit();
        }
} else {
    header("Location: login.php");
    exit();
}
?>