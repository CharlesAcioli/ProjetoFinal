<?php
// Inclui o arquivo de configuração do banco de dados
include_once('../php/config.php');

// Verifica se o 'id' foi passado via método GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepara a consulta SQL para buscar o equipamento com o ID especificado
        $stmt = $conn->prepare("SELECT * FROM equipamentos WHERE equipamento_id = :id");
        
        // Vincula o parâmetro ID de forma segura para evitar SQL Injection
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Executa a consulta
        $stmt->execute();
        
        // Pega o resultado da consulta
        $equipamento = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se o equipamento não for encontrado, exibe uma mensagem de erro
        if (!$equipamento) {
            echo "Equipamento não encontrado!";
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar o equipamento: " . $e->getMessage();
        exit();
    }
} else {
    // Se o 'id' não foi fornecido, exibe uma mensagem de erro
    echo "ID do equipamento não especificado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Equipamento</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1, h2 { text-align: center; color: #333; }
        .info-item { margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px; }
        .info-item:last-child { border-bottom: none; }
        .info-label { font-weight: bold; color: #555; display: inline-block; width: 200px; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Informações do Equipamento</h1>
        <hr>

        <div class="info-item">
            <span class="info-label">ID do Equipamento:</span>
            <span><?= htmlspecialchars($equipamento['equipamento_id'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Nome:</span>
            <span><?= htmlspecialchars($equipamento['nome_equipamento'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>
        
        <div class="info-item">
            <span class="info-label">Tipo:</span>
            <span><?= htmlspecialchars($equipamento['tipo_equipamento'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Status:</span>
            <span><?= htmlspecialchars($equipamento['status'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Localização:</span>
            <span><?= htmlspecialchars($equipamento['localizacao'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Fabricante:</span>
            <span><?= htmlspecialchars($equipamento['fabricante'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>
        
        <div class="info-item">
            <span class="info-label">Número do Modelo:</span>
            <span><?= htmlspecialchars($equipamento['numero_modelo'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>
        
        <div class="info-item">
            <span class="info-label">Número de Série:</span>
            <span><?= htmlspecialchars($equipamento['numero_serie'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Criticidade:</span>
            <span><?= htmlspecialchars($equipamento['criticidade'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Departamento:</span>
            <span><?= htmlspecialchars($equipamento['departamento'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Atribuído a:</span>
            <span><?= htmlspecialchars($equipamento['atribuido_a'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Data de Instalação:</span>
            <span><?= htmlspecialchars($equipamento['data_instalacao'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Data de Compra:</span>
            <span><?= htmlspecialchars($equipamento['data_compra'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Custo de Compra:</span>
            <span><?= htmlspecialchars($equipamento['custo_compra'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Fim da Garantia:</span>
            <span><?= htmlspecialchars($equipamento['data_termino_garantia'], ENT_QUOTES, 'UTF-8') ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Especificações:</span>
            <span><?= nl2br(htmlspecialchars($equipamento['especificacoes'], ENT_QUOTES, 'UTF-8')) ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Dados de Uso:</span>
            <span><?= nl2br(htmlspecialchars($equipamento['dados_uso'], ENT_QUOTES, 'UTF-8')) ?></span>
        </div>

        <div class="info-item">
            <span class="info-label">Notas:</span>
            <span><?= nl2br(htmlspecialchars($equipamento['notas'], ENT_QUOTES, 'UTF-8')) ?></span>