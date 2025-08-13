<?php
include_once('../php/config.php');

if (isset($_GET['cnpj'])) {
    $cnpj = $_GET['cnpj'];

    try {
        // Inicia uma transação para garantir que ambas as operações sejam executadas
        $conn->beginTransaction();

        // 1. Excluir todos os equipamentos ligados a esta empresa
        $stmt_equipamentos = $conn->prepare("DELETE FROM equipamentos WHERE cnpj_empresa = :cnpj");
        $stmt_equipamentos->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
        $stmt_equipamentos->execute();

        // 2. Agora, excluir a empresa
        $stmt_empresa = $conn->prepare("DELETE FROM empresas WHERE cnpj = :cnpj");
        $stmt_empresa->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
        $stmt_empresa->execute();

        // Confirma as operações no banco de dados
        $conn->commit();

        // Redireciona de volta para a lista após a exclusão
        header('Location: exibir_empresas.php?status=success_delete');
        exit();

    } catch (PDOException $e) {
        // Se algo der errado, desfaz todas as operações
        $conn->rollBack();

        // Em caso de erro, redireciona com mensagem de erro
        header('Location: exibir_empresas.php?status=error_delete');
        exit();
    }
} else {
    // Se nenhum CNPJ for fornecido, redireciona de volta
    header('Location: exibir_empresas.php');
    exit();
}
?>