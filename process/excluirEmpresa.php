<?php
include_once('../php/config.php');

if (isset($_GET['cnpj'])) {
    $cnpj = $_GET['cnpj'];

    try {
        $conn->beginTransaction();
        $stmt_equipamentos = $conn->prepare("DELETE FROM equipamentos WHERE cnpj_empresa = :cnpj");
        $stmt_equipamentos->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
        $stmt_equipamentos->execute();

        $stmt_empresa = $conn->prepare("DELETE FROM empresas WHERE cnpj = :cnpj");
        $stmt_empresa->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
        $stmt_empresa->execute();

        $conn->commit();

        header('Location: exibir_empresas.php?status=success_delete');
        exit();

    } catch (PDOException $e) {
        $conn->rollBack();

        header('Location: exibir_empresas.php?status=error_delete');
        exit();
    }
} else {
    header('Location: exibir_empresas.php');
    exit();
}
?>