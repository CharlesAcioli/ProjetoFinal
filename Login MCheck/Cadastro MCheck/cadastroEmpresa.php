<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../Cadastro Usuário/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro de Empresa</title>
</head>
<body>
    <img src="../../Cadastro Usuário/logo.svg" alt="">
    <main>
        <h1>CADASTRO EMPRESA</h1>
        <form action="../../process/insertEmpresas.php" method="post">
            <label for="CNPJ">CNPJ</label>
            <input type="text" placeholder="Informe o CNPJ da sua empresa" name="cnpj" id=""><br>

            <label for="Razao">Razão Social</label>
            <input type="text" placeholder="Informe a razão social da sua empresa" name="Razao"><br>

            <label for="Fantasia">Nome Fantasia</label>
            <input type="text" placeholder="Informe o nome fantasia da sua empresa" name="Fantasia"><br>

            <label for="Estadual">Inscriçao Estadual</label>
            <input type="text" placeholder="Incrição estadual da sua empresa" name="Estadual"><br>

            <label for="Segmento">Segmento</label><br>
            <input type="text" name="Segmento" id="" placeholder="Informe o segmento da sua empresa">
            <br>

            <label for="Produtos">Produtos/Serviços Oferecidos</label><br>
            <input type="text" name="Produtos" id="" placeholder="Informe os produtos ou serviços oferecidos pela sua empresa">
            <br>

            <label for="Email">Email</label>
            <input type="text" placeholder="Informe o email registrado na sua empresa" name="Email" id=""><br>

            <label for="Conf_email">Confirme seu Email</label>
            <input type="text" placeholder="Repita o email para confirmação" name="" id=""><br>

            <label for="Senha">Senha</label>
            <input type="text" placeholder="Crie uma senha" name="senha_hash" id=""><br>

            <label for="conf_senha">Confirme sua senha</label>
            <input type="text" placeholder="Confirme a senha informada anteiormente" name="" id=""><br>

            <div class="botao">
                <button type="submit">Registrar</button>
            </div>
        </form>
    </main>
</body>
</html>

<!-- ATRIBUTOS DO INPUT, USANDO INPUTMODE -->

<!-- Apenas números
<input type="text" inputmode="numeric" placeholder="Digite um código" />

Número com ponto ou vírgula
<input type="text" inputmode="decimal" placeholder="Digite um valor" />

E-mail
<input type="text" inputmode="email" placeholder="Digite seu e-mail" /> -->

<!-- | Valor     | Comportamento do teclado                             | Uso comum                          |
| --------- | ---------------------------------------------------- | ---------------------------------- |
| `none`    | Nenhum teclado (útil para bloqueios personalizados)  | Interfaces com entrada não textual |
| `text`    | Teclado padrão (letras, símbolos)                    | Entrada de texto geral             |
| `decimal` | Teclado com números e separador decimal (`.` ou `,`) | Preços, valores monetários         |
| `numeric` | Teclado com apenas números (`0–9`)                   | Códigos, PINs, quantidades         |
| `tel`     | Teclado de telefone com `0–9`, `#`, `*`              | Números de telefone                |
| `email`   | Teclado com `@`, `.`, etc.                           | Campos de e-mail                   |
| `url`     | Teclado com `/`, `.`, `www.`                         | Campos de URL                      |
| `search`  | Teclado padrão + botão "Buscar"                      | Barras de busca                    | -->


<!-- 📌 Dica:
Você pode usar inputmode junto com type="text" quando quiser um tipo de teclado sem mudar a
semântica ou o comportamento de validação do campo. -->