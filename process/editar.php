<?php
include_once('../php/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM equipamentos WHERE equipamento_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $equipamento = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$equipamento) {
            header('Location: listaEquipamentos.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar os dados do equipamento: " . $e->getMessage();
        exit();
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $id = $_POST['equipamento_id'];
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
        $data_termino_garantia = $_POST['data_termino_garantia'];
        $custo_compra = $_POST['custo_compra'];
        $especificacoes = $_POST['especificacoes'];
        $dados_uso = $_POST['dados_uso'];
        $notas = $_POST['notas'];
        $patrimonio = $_POST['patrimonio'];
        $cnpj_empresa = $_POST['cnpj_empresa'];

        $sql = "UPDATE equipamentos SET 
                nome_equipamento = :nome_equipamento,
                tipo_equipamento = :tipo_equipamento,
                status = :status,
                localizacao = :localizacao,
                fabricante = :fabricante,
                numero_modelo = :numero_modelo,
                numero_serie = :numero_serie,
                criticidade = :criticidade,
                departamento = :departamento,
                atribuido_a = :atribuido_a,
                data_instalacao = :data_instalacao,
                data_compra = :data_compra,
                data_termino_garantia = :data_termino_garantia,
                custo_compra = :custo_compra,
                especificacoes = :especificacoes,
                dados_uso = :dados_uso,
                notas = :notas,
                patrimonio = :patrimonio,
                cnpj_empresa = :cnpj_empresa
                WHERE equipamento_id = :id";

        $stmt = $conn->prepare($sql);
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
        $stmt->bindParam(':data_termino_garantia', $data_termino_garantia);
        $stmt->bindParam(':custo_compra', $custo_compra);
        $stmt->bindParam(':especificacoes', $especificacoes);
        $stmt->bindParam(':dados_uso', $dados_uso);
        $stmt->bindParam(':notas', $notas);
        $stmt->bindParam(':patrimonio', $patrimonio);
        $stmt->bindParam(':cnpj_empresa', $cnpj_empresa);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        header('Location: exibir_equipamentos.php?status=success_edit');
        exit();
    } catch (PDOException $e) {
        header('Location: exibir_equipamentos.php?status=error_edit');
        exit();
    }
} else {
    header('Location: exibir_equipamentos.php');
    exit();
}
?>