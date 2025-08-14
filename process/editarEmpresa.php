<?php
include_once('../php/config.php');

// Se a requisição for POST, processa a atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $cnpj = $_POST['cnpj'];
        $razao_social = $_POST['razao_social'];
        $nome_fantasia = $_POST['nome_fantasia'];
        $inscricao_estadual = $_POST['inscricao_estadual'];
        $segmento = $_POST['segmento'];
        $email_contato = $_POST['email_contato'];

        $sql = "UPDATE empresas SET 
                razao_social = :razao_social,
                nome_fantasia = :nome_fantasia,
                inscricao_estadual = :inscricao_estadual,
                segmento = :segmento,
                email_contato = :email_contato
                WHERE cnpj = :cnpj";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':razao_social', $razao_social);
        $stmt->bindParam(':nome_fantasia', $nome_fantasia);
        $stmt->bindParam(':inscricao_estadual', $inscricao_estadual);
        $stmt->bindParam(':segmento', $segmento);
        $stmt->bindParam(':email_contato', $email_contato);
        $stmt->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);

        $stmt->execute();
        
        header('Location: exibir_empresas.php?status=success_edit');
        exit();

    } catch (PDOException $e) {
        header('Location: exibir_empresas.php?status=error_edit');
        exit();
    }
} else if (isset($_GET['cnpj'])) {
    // Se a requisição for GET e houver um CNPJ, busca os dados para exibir no formulário
    $cnpj = $_GET['cnpj'];

    try {
        $stmt = $conn->prepare("SELECT * FROM empresas WHERE cnpj = :cnpj");
        $stmt->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
        $stmt->execute();
        $empresa = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$empresa) {
            header('Location: exibir_empresas.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar os dados da empresa: " . $e->getMessage();
        exit();
    }
} else {
    header('Location: exibir_empresas.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Empresa</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f8; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"] {
            width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;
        }
        button[type="submit"]:hover { background-color: #0056b3; }
        a.btn-cancelar { background-color: #6c757d; color: white; padding: 10px 15px; border-radius: 4px; text-decoration: none; margin-left: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Empresa</h2>
        <form action="editarEmpresa.php" method="POST">
            <input type="hidden" name="cnpj" value="<?= htmlspecialchars($empresa['cnpj']) ?>">

            <div class="form-group">
                <label for="cnpj_display">CNPJ (não editável)</label>
                <input type="text" id="cnpj_display" value="<?= htmlspecialchars($empresa['cnpj']) ?>" disabled>
            </div>

            <div class="form-group">
                <label for="razao_social">Razão Social</label>
                <input type="text" name="razao_social" value="<?= htmlspecialchars($empresa['razao_social']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="nome_fantasia">Nome Fantasia</label>
                <input type="text" name="nome_fantasia" value="<?= htmlspecialchars($empresa['nome_fantasia']) ?>">
            </div>

            <div class="form-group">
                <label for="inscricao_estadual">Inscrição Estadual</label>
                <input type="text" name="inscricao_estadual" value="<?= htmlspecialchars($empresa['inscricao_estadual']) ?>">
            </div>

            <div class="form-group">
                <label for="segmento">Segmento</label>
                <input type="text" name="segmento" value="<?= htmlspecialchars($empresa['segmento']) ?>">
            </div>
            
            <div class="form-group">
                <label for="email_contato">E-mail</label>
                <input type="email" name="email_contato" value="<?= htmlspecialchars($empresa['email_contato']) ?>">
            </div>

            <button type="submit">Salvar Alterações</button>
            <a href="exibir_empresas.php" class="btn-cancelar">Cancelar</a>
        </form>
    </div>
</body>
</html>