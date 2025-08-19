<?php 
include_once('../php/config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="perfil.css">
    <title>Document</title>
</head>
<body>
    <main>
        <nav>
            <img src="../Cadastro Usuário/logo.svg" alt="">
            <ul>
                <li>
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <a href="">Equipamentos</a>
                </li>
                <li>
                    <i class="fas fa-plus-circle"></i>
                    <a href="">Adicionar Equipamentos</a>
                </li>
                <li>
                    <i class="fas fa-exclamation-triangle"></i>
                    <a href="">Equip. c/Defeito</a>
                </li>
                <li>
                    <i class="fa-solid fa-user-group"></i>
                    <a href="">Usuários</a>
                </li>
                <li>
                    <i class="fas fa-clipboard-list"></i>
                    <a href="">Ordens de serviço</a>
                </li>
                <li>
                    <i class="fas fa-chart-column"></i>
                    <a href="">Relatórios</a>
                </li>
                <li>
                    <i class="fa-solid fa-wrench"></i>
                    <a href="">Manutenção</a>
                </li>
                <li>
                    <i class="fa-solid fa-gear"></i>
                    <a href="">Configurações</a>
                </li>
            </ul>
        </nav>

        <form action="" method="post">
            <h1>Perfil</h1>
            <hr>

            <article>
                <section class="card">
                    <header>
                        <h3>FUNÇÃO</h3>
                        <hr><br>
                        <img src="../Cadastro Usuário/logo.svg" alt="Foto do usuário"><br>
                        <button>Sair</button>
                        <button>Editar</button>
                    </header>

                    <dl>
                        <dt>Nome</dt>
                        <dd><?php echo htmlspecialchars($_SESSION['username']); ?></h2></dd>

                        <dt>Email</dt>
                        <dd><?php echo htmlspecialchars($_SESSION['email']); ?></h2></dd>

                        <dt>Telefone</dt>
                        <dd><?php echo htmlspecialchars($_SESSION['telefone']); ?></h2></dd></dd>

                        <dt>CPF</dt>
                        <dd><?php echo htmlspecialchars($_SESSION['cpf']); ?></h2></dd></dd>
                    </dl>
                </section>
            </article>

            <section class="s-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Status</th>
                            <th>Setor</th>
                            <th>Patrimônio</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Número ID</td>
                            <td>Equipamentos</td>
                            <td>Ativo/Inativo</td>
                            <td>Nome do setor</td>
                            <td>Número do Patrimônio</td>
                            <td>
                                <button><i class="fa-regular fa-eye"></i></button>
                                <button><i class="fa-regular fa-pen-to-square"></i></button>
                                <button><i class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </form>
    </main>
</body>
</html>