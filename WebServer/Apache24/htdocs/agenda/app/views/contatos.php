<?php
session_name("agenda");
session_start();

if (!isset($_SESSION['usuario_id'])) 
{
    header("Location: ../../index.php");
    exit();
}

require_once("../models/Contact.php");

$id_usuario = $_SESSION['usuario_id'];
$busca = isset($_GET['busca']) ? trim($_GET['busca']) : '';

$contactModel = new Contact();
$contatos = $contactModel->ListarContatos($id_usuario, $busca);

function getIniciais($nome) {
    $palavras = explode(' ', trim($nome));
    $iniciais = '';
    if (isset($palavras[0][0])) $iniciais .= strtoupper($palavras[0][0]);
    if (isset($palavras[1][0])) $iniciais .= strtoupper($palavras[1][0]);
    return !empty($iniciais) ? $iniciais : 'C';
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Meus Contatos</title>
    <link rel="stylesheet" href="../../public/css/style_dashboard.css">
    <link rel="stylesheet" href="../../public/css/style_contatos.css">
</head>

<body>
    <div class="principal">
        <aside class="aside-menu">
            <h2>Minha Agenda</h2>
            <ul>
                <li><a href="dashboard.php"><img class="img-cont" src="../../public/img/dashboard.png" alt="">Dashboard</a></li>
                <li><a href="contatos.php" class="active"><img class="img-cont" src="../../public/img/contato.png" alt="">Contatos</a></li>
                <li><a href="compromissos.php"><img class="img-cont" src="../../public/img/compromisso.png" alt="compromisso"> Compromissos</a></li>
                <li><a href="perfil.php"><img class="img-cont" src="../../public/img/perfil.png" alt="">Perfil</a></li>
                <li><a href="#"><img class="img-cont" src="../../public/img/configuracao.png" alt="">Configurações</a></li>
                <li><a href="../controllers/logoff.php"><img class="img-cont" src="../../public/img/sair.png" alt="">Sair</a></li>
            </ul>
        </aside>

        <div class="main-content">
            <header class="content-header">
                <div class="topo-flex">
                    <div class="pesquisa-topo">
                        <form action="contatos.php" method="GET">
                            <input type="text" name="busca" value="<?php echo htmlspecialchars($busca); ?>" placeholder="Pesquisar contato!!">
                            <button type="submit">Buscar</button>
                        </form>
                    </div>
                    <div class="perfil-topo">
                        <span><?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></span>
                    </div>
                </div>
                
                <div class="titulo-pagina-contatos">
                    <div>
                        <h1>Meus Contatos</h1>
                        <p>Gerencie sua lista de contatos salvos.</p>
                    </div>
                    <a href="form_contato.php" class="btn-adicionar" style="text-decoration: none; display: inline-block; text-align: center; line-height: 40px;">+ Novo Contato</a>
                </div>
            </header>

            <div class="container-tabela">
                <table class="tabela-contatos">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($contatos) > 0): ?>
                            <?php foreach($contatos as $row): ?>
                                <tr>
                                    <td><div class="avatar-letra"><?php echo getIniciais($row['nome']); ?></div></td>
                                    <td><strong><?php echo htmlspecialchars($row['nome']); ?></strong></td>
                                    <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td>
                                        <a href="form_contato.php?id=<?php echo $row['id']; ?>" class="btn-acao btn-editar" style="text-decoration: none; display: inline-block; text-align: center; line-height: 30px;">Editar</a>
                                        
                                        <a href="../controllers/deletar_contato.php?id=<?php echo $row['id']; ?>" class="btn-acao btn-excluir" style="text-decoration: none; display: inline-block; text-align: center; line-height: 30px;" onclick="return confirm('Tem certeza que deseja excluir este contato?');">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 20px; color: #7f8c8d;">Nenhum contato cadastrado ou encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>