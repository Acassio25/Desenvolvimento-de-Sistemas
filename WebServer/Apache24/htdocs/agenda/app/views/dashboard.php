<?php
    session_name("agenda"); 
    session_start();

    if (!isset($_SESSION['usuario_id'])) 
    {
        header("Location: ../../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Agenda</title>
        <link rel="stylesheet" href="../../public/css/style_dashboard.css">
    </head>

    <body>
    <div class="principal">
        <aside class="aside-menu">
            <h2>Minha Agenda</h2>
            <ul>
                <li><a href="dashboard.php" class="active"><img class="img-cont" src="../../public/img/dashboard.png" alt="">Dashboard</a></li>
                <li><a href="contatos.php"><img class="img-cont" src="../../public/img/contato.png" alt="">Contatos</a></li>
                <li><a href="compromissos.php"><img class="img-cont" src="../../public/img/compromisso.png" alt="compromisso"> Compromissos</a></li>
                <li><a href="perfil.php"><img class="img-cont" src="../../public/img/perfil.png" alt="">Perfil</a></li>
                <li><a href="#"><img class="img-cont" src="../../public/img/configuracao.png" alt="">Configurações</a></li>
                <li><a href="../controllers/logoff.php"><img class="img-cont" src="../../public/img/sair.png" alt="">Sair</a></li>
            </ul>
        </aside>

        <div class="main-content">
            <header class="content-header">
                <div class="titulo-pagina">
                    <h1>Painel Principal</h1>
                    <p>Olá, bem-vindo de volta! <span>👋</span></p>
                </div>

                <div class="pesquisa-topo">
                    <form action="/buscar" method="GET">
                        <input type="text" name="busca" placeholder="Pesquisar compromisso ou contato...">
                        <button type="submit">Buscar</button>
                    </form>
                </div>

                <div class="perfil-topo">
                    <span><?php echo $_SESSION['usuario_nome'] ?? 'Administrador'; ?></span>
                </div>
            </header>

            <div class="container-body">
                <div class="card-col">
                    <div class="divcard">
                        <img class="img-cont" src="../../public/img/contato.png" alt="contatos">
                        <h3>Contatos</h3>
                    </div>
                </div>

                <div class="card-col">
                    <div class="divcard">
                        <img class="img-cont" src="../../public/img/compromisso.png" alt="compromissos">
                        <h3>Compromissos</h3>
                    </div>
                </div>

                <div class="card-col">
                    <div class="divcard">
                        <img class="img-cont" src="../../public/img/tarefas.jpg" alt="tarefas">
                        <h3>Tarefas</h3>
                    </div>
                </div>

                <div class="card-col">
                    <div class="divcard">
                        <img class="img-cont" src="../../public/img/concluido.jpg" alt="concluidos">
                        <h3>Concluídos</h3>
                    </div>
                </div>
            </div>

            <div class="container-body2">
                <div class="card-col-large">
                    <h3>Próximos Compromissos</h3>
                </div>

                <div class="card-col-large">
                    <h3>Contatos Recentes</h3>
                </div>
            </div>
        </div>
    </div>
    </body>

</html>