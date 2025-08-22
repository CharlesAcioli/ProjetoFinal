<?php
include_once('../php/config.php');
$setor = $_SESSION['setor'];
$nome = $_SESSION['username'];
$email = $_SESSION['email'];
$telefone = $_SESSION['telefone'];
$cpf = $_SESSION['cpf'];
try {
    $stmt = $conn->prepare("SELECT * FROM equipamentos WHERE atribuido_a = ? ORDER BY equipamento_id DESC");
    $stmt->execute([$setor]);
    $equipamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar os dados: " . $e->getMessage();
    exit();
}
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
            <img class="nav" src="../logo.svg" alt="">
            <ul>
                <li>
                    <img src="img/equipamentos.svg" alt="">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <a href="">Equipamentos</a>
                </li>
                <li>
                    <img src="img/adicionar equipamentos.svg" alt="">
                    <i class="fas fa-plus-circle"></i>
                    <a href="">Adicionar Equipamentos</a>
                </li>
                <li>
                    <img src="img/equipamento com defeito.svg" alt="">
                    <i class="fas fa-exclamation-triangle"></i>
                    <a href="">Equip. c/Defeito</a>
                </li>
                <li>
                    <img src="img/usuários.svg" alt="">
                    <i class="fa-solid fa-user-group"></i>
                    <a href="">Usuários</a>
                </li>
                <li>
                    <img src="img/OS.svg" alt="">
                    <i class="fas fa-clipboard-list"></i>
                    <a href="">Ordens de serviço</a>
                </li>
                <li>
                    <img src="img/relatórios.svg" alt="">
                    <i class="fas fa-chart-column"></i>
                    <a href="">Relatórios</a>
                </li>
                <li>
                    <img src="img/manutenção.svg" alt="">
                    <i class="fa-solid fa-wrench"></i>
                    <a href="">Manutenção</a>
                </li>
                <li>
                    <img src="img/configurações.svg" alt="">
                    <i class="fa-solid fa-gear"></i>
                    <a href="">Configurações</a>
                </li>
            </ul>
        </nav>
        <form action="../process/editarFuncionario.php" method="post">
            <h1>Perfil</h1>
            <hr>
            <article>
                <section class="card">
                    <header>
                        <h3>FUNÇÃO</h3>
                        <hr><br>
                        <img src="../Cadastro Usuário/logo.svg" alt="Foto do usuário"><br>
                        <button type="button" onclick="window.location.href='../process/logout.php'">Sair</button>
                        <button>Editar</button>
                    </header>
                    <dl>
                        <dt>Nome</dt>
                        <dd><?php echo $nome; ?></h2>
                        </dd>
                        <dt>Email</dt>
                        <dd><?php echo $email; ?></h2>
                        </dd>
                        <dt>Telefone</dt>
                        <dd><?php echo $telefone; ?></h2>
                        </dd>
                        </dd>
                        <dt>CPF</dt>
                        <dd><?php echo $cpf; ?></h2>
                        </dd>
                        </dd>
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
                        <?php if ($equipamentos): ?>
                            <?php foreach ($equipamentos as $equip): ?>
                                <tr>
                                    <td><?= htmlspecialchars($equip['equipamento_id']) ?></td>
                                    <td><?= htmlspecialchars($equip['nome_equipamento']) ?></td>
                                    <td><?= htmlspecialchars($equip['status']) ?></td>
                                    <td><?= htmlspecialchars($equip['atribuido_a']) ?></td>
                                    <td><?= htmlspecialchars($equip['patrimonio']) ?></td>
                                    <td>
                                        <button><i class="fa-regular fa-eye"></i></button>
                                        <button><i class="fa-regular fa-pen-to-square"></i></button>
                                        <button><i class="fa-regular fa-trash-can"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </section>
        </form>
    </main>
</body>
</html>