<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./process/insertEquip.php" method="post">
        <label for="nome_equipamento">Nome do Equipamento:</label>
        <input type="text" name="nome_equipamento" id="">
        <br>
        <label for="tipo_equipamento">Tipo de Equipamento</label>
        <input type="text" name="tipo_equipamento" id="">
        <br>
        <label for="status">Status</label>
        <select name="status" id="">
            <option value="Em manutenção">Em Manutenção</option>
            <option value="Precisa de repado">Precisa de reparo</option>
            <option value="Operacional">Operacional</option>
        </select>
        <br>
        <label for="localizacao">Localização</label>
        <input type="text" name="localizacao" id="">
        <br>
        <label for="fabricante">Fabricante</label>
        <input type="text" name="fabricante" id="">
        <br>
        <label for="n_modelo">Número do modelo</label>
        <input type="text" name="n_modelo" id="">
        <br>
        <label for="n_serie">Número de série</label>
        <input type="text" name="n_serie" id="">
        <br>
        <label for="criticidade">Criticidade</label>
        <select name="criticidade" id="">
            <option value="alta">Alta</option>
            <option value="media">Média</option>
            <option value="baixa">Baixa</option>
        </select>
        <br>
        <label for="departamento">Departamento</label>
        <input type="text" name="departamento" id="">
        <br>
        <label for="atribuicao">Atribuido a:</label>
        <input type="text" name="atribuicao" id="">
        <br>
        <label for="data_ins">Data de Instalação</label>
        <input type="date" name="data_ins" id="">
        <br>
        <label for="data_compra">Data de Compra</label>
        <input type="date" name="data_compra" id="">
        <br>
        <label for="data_garantia">Data de Garantia</label>
        <input type="date" name="data_garantia" id="">
        <br>
        <label for="custo">Custo de compra</label>
        <input type="number" name="custo" id="">
        <br>
        <label for="especificacoes">Especificações</label>
        <input type="text" name="especificacoes" id="">
        <br>
        <label for="dados_uso">Dados de Uso</label>
        <input type="text" name="dados_uso" id="">
        <br>
        <label for="notas">Notas</label>
        <input type="text" name="notas" id="">
        <br>
        <label for="patrimonio">Patrimônio</label>
        <input type="text" name="patrimonio" id="">
        <br>
        <label for="cnpj">CNPJ:</label>
        <input type="text" name="cnpj" id="">
        <br>
        <input type="submit" value="Registrar Equipamento">
    </form>
</body>

</html>