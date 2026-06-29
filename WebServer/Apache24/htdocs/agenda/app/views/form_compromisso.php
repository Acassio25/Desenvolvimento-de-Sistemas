<?php
session_name("agenda");
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../index.php");
    exit();
}

$editando = false;
$titulo = "";
$descricao = "";
$data_compromisso = "";
$hora_compromisso = "";

if (isset($compromisso)) {
    $editando = true;
    $titulo = $compromisso['titulo'];
    $descricao = $compromisso['descricao'];
    $data_compromisso = $compromisso['data_compromisso'];
    $hora_compromisso = $compromisso['hora_compromisso'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - <?php echo $editando ? 'Editar' : 'Novo'; ?> Compromisso</title>
    <link rel="stylesheet" href="../../public/css/style_dashboard.css">
    <link rel="stylesheet" href="../../public/css/style_compromissos.css">
</head>
<body>

    <div class="principal">
        
        <aside class="aside-menu">
            <h2>Minha Agenda</h2>
            <ul>
                <li><a href="dashboard.php"><img class="img-cont" src="../../public/img/dashboard.png">Dashboard</a></li>
                <li><a href="contatos.php"><img class="img-cont" src="../../public/img/contato.png">Contatos</a></li>
                <li><a href="compromissos.php" class="active"><img class="img-cont" src="../../public/img/compromisso.png">Compromissos</a></li>
                <li><a href="perfil.php"><img class="img-cont" src="../../public/img/perfil.png">Perfil</a></li>
                <li><a href="#"><img class="img-cont" src="../../public/img/configuracao.png">Configurações</a></li>
                <li><a href="../controllers/logoff.php"><img class="img-cont" src="../../public/img/sair.png">Sair</a></li>
            </ul>
        </aside>

        <div class="main-content">
            
            <header class="content-header">
                <div class="topo-flex">
                    <div class="pesquisa-topo">
                        <form action="/buscar" method="GET">
                            <input type="text" name="busca" placeholder="Pesquisar...">
                            <button type="submit">Buscar</button>
                        </form>
                    </div>
                    <div class="perfil-topo">
                        <span><?php echo $_SESSION['usuario_nome'] ?? 'Administrador'; ?></span>
                    </div>
                </div>
                
                <div class="titulo-secao">
                    <h1><?php echo $editando ? 'Editar Compromisso' : 'Novo Compromisso'; ?></h1>
                    <p>Preencha os dados abaixo para organizar a sua agenda.</p>
                </div>
            </header>

            <div class="card-form-compromisso">
                <form action="../controllers/salvar_compromisso.php" method="POST">
                    
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?? ''; ?>">

                    <div class="campo-grupo">
                        <label for="titulo">Título do Compromisso</label>
                        <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>" placeholder="Ex: Reunião, Dentista, Aniversário..." required>
                    </div>

                    <div class="linha-campos-duplos">
                        <div class="campo-grupo">
                            <label for="data_compromisso">Data</label>
                            <input type="date" id="data_compromisso" name="data_compromisso" value="<?php echo $data_compromisso; ?>" required>
                        </div>
                        
                        <div class="campo-grupo">
                            <label for="hora_compromisso">Horário</label>
                            <input type="time" id="hora_compromisso" name="hora_compromisso" value="<?php echo $hora_compromisso; ?>" required>
                        </div>
                    </div>

                    <div class="campo-grupo">
                        <label for="descricao">Descrição / Observações (Opcional)</label>
                        <textarea id="descricao" name="descricao" placeholder="Adicione detalhes sobre o compromisso..."><?php echo htmlspecialchars($descricao); ?></textarea>
                    </div>

                    <div class="acoes-form">
                        <button type="submit" class="btn-salvar-form">Salvar Compromisso</button>
                        <a href="compromissos.php" class="btn-cancelar-form">Cancelar</a>
                    </div>

                </form>
            </div>

        </div>
    </div>

</body>
</html>