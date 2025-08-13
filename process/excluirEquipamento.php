<?php
include_once('../php/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {

        $stmt = $conn->prepare("DELETE FROM equipamentos WHERE equipamento_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();


        header('Location: exibir_equipamentos.php?status=success_delete');
        exit();

    } catch (PDOException $e) {

        header('Location: exibir_equipamentos.php?status=error_delete');
        exit();
    }
} else {
    header('Location: exibir_equipamentos.php');
    exit();
}
?>