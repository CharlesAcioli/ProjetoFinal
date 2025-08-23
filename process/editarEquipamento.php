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

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Equipamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        a.btn-cancelar {
            background-color: #6c757d;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            text-decoration: none;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Editar Equipamento</h2>
        <form action="editar.php" method="POST">
            <input type="hidden" name="equipamento_id" value="<?= htmlspecialchars($equipamento['equipamento_id']) ?>">

            <div class="form-group">
                <label for="nome_equipamento">Nome do Equipamento</label>
                <input type="text" name="nome_equipamento" value="<?= htmlspecialchars($equipamento['nome_equipamento']) ?>" required>
            </div>

            <div class="form-group">
                <label for="tipo_equipamento">Tipo</label>
                <input type="text" name="tipo_equipamento" value="<?= htmlspecialchars($equipamento['tipo_equipamento']) ?>" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="<?= htmlspecialchars($equipamento['status']) ?>"><?= htmlspecialchars($equipamento['status']) ?></option>
                  <option value="Em Manutenção">Em Manutenção</option>
                  <option value="Precisa De Reparo">Precisa De Reparo</option>
                  <option value="Operacional">Operacional</option>
                </select>
            </div>
            <div class="form-group">
                <label for="localizacao">Localização</label>
                <input type="text" name="localizacao" value="<?= htmlspecialchars($equipamento['localizacao']) ?>">
            </div>

            <div class="form-group">
                <label for="fabricante">Fabricante</label>
                <input type="text" name="fabricante" value="<?= htmlspecialchars($equipamento['fabricante']) ?>">
            </div>

            <div class="form-group">
                <label for="numero_modelo">Modelo</label>
                <input type="text" name="numero_modelo" value="<?= htmlspecialchars($equipamento['numero_modelo']) ?>">
            </div>

            <div class="form-group">
                <label for="numero_serie">Série</label>
                <input type="text" name="numero_serie" value="<?= htmlspecialchars($equipamento['numero_serie']) ?>">
            </div>

            <div class="form-group">
                <label for="criticidade">Criticidade</label>
                <select id="criticidade" name="criticidade" required>
                    <option value="<?= htmlspecialchars($equipamento['criticidade']) ?>"><?= htmlspecialchars($equipamento['criticidade']) ?></option>
                    <option value="alta">Alto</option>
                    <option value="media">Médio</option>
                    <option value="baixa">Baixo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="departamento">Departamento</label>
                <input type="text" name="departamento" value="<?= htmlspecialchars($equipamento['departamento']) ?>">
            </div>

            <div class="form-group">
                <label for="atribuido_a">Atribuído a</label>
                <select name="atribuido_a" id="atribuido_a">
                    <option value="<?= htmlspecialchars($equipamento['atribuido_a']) ?>"><?= htmlspecialchars($equipamento['atribuido_a']) ?></option>
                    <option value="Tecnologia da Informação">Tecnologia da Informação</option>
                    <option value="Saúde e Bem-Estar">Saúde e Bem-Estar</option>
                    <option value="Serviços Financeiros">Serviços Financeiros</option>
                    <option value="Varejo e Comércio">Varejo e Comércio</option>
                    <option value="Educação">Educação</option>
                    <option value="Construção Civil">Construção Civil</option>
                    <option value="Indústria Manufatureira">Indústria Manufatureira</option>
                    <option value="Setor Agrícola">Setor Agrícola (Agronegócio)</option>
                    <option value="Energia">Energia</option>
                    <option value="Transporte e Logística">Transporte e Logística</option>
                    <option value="Mídia e Entretenimento">Mídia e Entretenimento</option>
                    <option value="Recursos Humanos">Recursos Humanos (RH)</option>
                    <option value="Governo e Setor Público">Governo e Setor Público</option>
                    <option value="Turismo e Hotelaria">Turismo e Hotelaria</option>
                    <option value="Serviços Imobiliários">Serviços Imobiliários</option>
                    <option value="Biotecnologia">Biotecnologia</option>
                    <option value="Sustentabilidade e Meio Ambiente">Sustentabilidade e Meio Ambiente</option>
                    <option value="Marketing e Publicidade">Marketing e Publicidade</option>
                    <option value="Indústria Alimentícia">Indústria Alimentícia</option>
                    <option value="Consultoria">Consultoria</option>
            </div>
            </select>
    </div>
    <div class="form-group">
        <label for="data_instalacao">Data de Instalação</label>
        <input type="date" name="data_instalacao" value="<?= htmlspecialchars($equipamento['data_instalacao']) ?>">
    </div>

    <div class="form-group">
        <label for="data_compra">Data de Compra</label>
        <input type="date" name="data_compra" value="<?= htmlspecialchars($equipamento['data_compra']) ?>">
    </div>

    <div class="form-group">
        <label for="data_termino_garantia">Data de Término da Garantia</label>
        <input type="date" name="data_termino_garantia" value="<?= htmlspecialchars($equipamento['data_termino_garantia']) ?>">
    </div>

    <div class="form-group">
        <label for="custo_compra">Custo de Compra (R$)</label>
        <input type="number" step="0.01" name="custo_compra" value="<?= htmlspecialchars($equipamento['custo_compra']) ?>">
    </div>

    <div class="form-group">
        <label for="especificacoes">Especificações</label>
        <textarea name="especificacoes" rows="4"><?= htmlspecialchars($equipamento['especificacoes']) ?></textarea>
    </div>

    <div class="form-group">
        <label for="dados_uso">Dados de Uso</label>
        <textarea name="dados_uso" rows="4"><?= htmlspecialchars($equipamento['dados_uso']) ?></textarea>
    </div>

    <div class="form-group">
        <label for="notas">Notas</label>
        <textarea name="notas" rows="4"><?= htmlspecialchars($equipamento['notas']) ?></textarea>
    </div>

    <div class="form-group">
        <label for="patrimonio">Patrimônio</label>
        <input type="text" name="patrimonio" value="<?= htmlspecialchars($equipamento['patrimonio']) ?>">
    </div>

    <div class="form-group">
        <label for="cnpj_empresa">CNPJ da Empresa</label>
        <input type="text" name="cnpj_empresa" value="<?= htmlspecialchars($equipamento['cnpj_empresa']) ?>">
    </div>

    <button type="submit">Salvar Alterações</button>
    <a href="exibir_equipamentos.php" class="btn-cancelar">Cancelar</a>
    </form>
    </div>
</body>

</html>