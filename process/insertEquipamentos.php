<?php
include_once('../php/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_equipamento = $_POST['nome_equipamento'];
    $tipo_equipamento = $_POST['tipo_equipamento'];
    $status = $_POST['status'];
    $localizacao = $_POST['localizacao'];
    $fabricante = $_POST['fabricante'];
    $numero_modelo = $_POST['numero_modelo'];
    $numero_serie = $_POST['numero_serie'];
    $criticidade = $_POST['criticidade'];
    $departamento = $_POST['departamento'];
    $atribuido_a = $_POST['atribuido_a'];
    $data_instalacao = $_POST['data_instalacao'];
    $data_compra = $_POST['data_compra'];
    $custo_compra = $_POST['custo_compra'];
    $data_termino_garantia = $_POST['data_termino_garantia'];
    $especificacoes = $_POST['especificacoes'];
    $dados_uso = $_POST['dados_uso'];
    $notas = $_POST['notas'];
    $patrimonio = $_POST['patrimonio'];
    $cnpj_empresa = $_POST['cnpj_empresa'];

    try {
        $stmt = $conn->prepare("INSERT INTO equipamentos (nome_equipamento, tipo_equipamento, status, localizacao, fabricante, numero_modelo, numero_serie, criticidade, departamento, atribuido_a, data_instalacao, data_compra, custo_compra, data_termino_garantia, especificacoes, dados_uso, notas, patrimonio, cnpj_empresa) VALUES (:nome_equipamento, :tipo_equipamento, :status, :localizacao, :fabricante, :numero_modelo, :numero_serie, :criticidade, :departamento, :atribuido_a, :data_instalacao, :data_compra, :custo_compra, :data_termino_garantia, :especificacoes, :dados_uso, :notas, :patrimonio, :cnpj_empresa)");
        $stmt->bindParam(':nome_equipamento', $nome_equipamento);
        $stmt->bindParam(':tipo_equipamento', $tipo_equipamento);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':localizacao', $localizacao);
        $stmt->bindParam(':fabricante', $fabricante);
        $stmt->bindParam(':numero_modelo', $numero_modelo);
        $stmt->bindParam(':numero_serie', $numero_serie);
        $stmt->bindParam(':criticidade', $criticidade);
        $stmt->bindParam(':departamento', $departamento);
        $stmt->bindParam(':atribuido_a', $atribuido_a);
        $stmt->bindParam(':data_instalacao', $data_instalacao);
        $stmt->bindParam(':data_compra', $data_compra);
        $stmt->bindParam(':custo_compra', $custo_compra);
        $stmt->bindParam(':data_termino_garantia', $data_termino_garantia);
        $stmt->bindParam(':especificacoes', $especificacoes);
        $stmt->bindParam(':dados_uso', $dados_uso);
        $stmt->bindParam(':notas', $notas);
        $stmt->bindParam(':patrimonio', $patrimonio);
        $stmt->bindParam(':cnpj_empresa', $cnpj_empresa);

        
        if ($stmt->execute()) {
            header("Location: exibir_equipamentos.php");
        } else {
            echo "Erro ao registrar a empresa.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>