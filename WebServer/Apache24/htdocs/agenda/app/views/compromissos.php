<?php
    session_name("agenda");
    session_start();

    if (!isset($_SESSION['usuario_id'])) 
    {
        header("Location: ../../index.php");
        exit();
    }

    require_once("../models/compromisso_mod.php");

    $id_usuario = $_SESSION['usuario_id'];
    $busca = isset($_GET['busca']) ? trim($_GET['busca']) : '';

    $appointmentModel = new Compromisso_Mod();
    $compromissos = $appointmentModel->ListarCompromissos($id_usuario, $busca);

    $meses_pt = [
        '01' => 'JAN',
        '02' => 'FEV',
        '03' => 'MAR',
        '04' => 'ABR',
        '05' => 'MAI',
        '06' => 'JUN',
        '07' => 'JUL',
        '08' => 'AGO',
        '09' => 'SET',
        '10' => 'OUT',
        '11' => 'NOV',
        '12' => 'DEZ'
    ];

    $cores = ['azul', 'vermelho', 'verde', 'roxo'];
    $index_cor = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Meus Compromissos</title>
    <link class="css-layout" rel="stylesheet" href="../../public/css/style_dashboard.css">
    <link class="css-pagina" rel="stylesheet" href="../../public/css/style_compromissos.css">
</head>

<body>
    <div class="principal">

        <aside class="aside-menu">
            <h2>Minha Agenda</h2>
            <ul>
                <li><a href="dashboard.php"><img class="img-cont" src="../../public/img/dashboard.png" alt="">Dashboard</a></li>
                <li><a href="contatos.php"><img class="img-cont" src="../../public/img/contato.png" alt="">Contatos</a></li>
                <li><a href="compromissos.php" class="active"><img class="img-cont" src="../../public/img/compromisso.png" alt="compromisso"> Compromissos</a></li>
                <li><a href="perfil.php"><img class="img-cont" src="../../public/img/perfil.png" alt="">Perfil</a></li>
                <li><a href="#"><img class="img-cont" src="../../public/img/configuracao.png" alt="">Configurações</a></li>
                <li><a href="../controllers/logoff.php"><img class="img-cont" src="../../public/img/sair.png" alt="">Sair</a></li>
            </ul>
        </aside>

        <div class="main-content">
            <header class="content-header">
                <div class="topo-flex">
                    <div class="pesquisa-topo">
                        <form action="compromissos.php" method="GET">
                            <input type="text" name="busca" value="<?php echo htmlspecialchars($busca); ?>" placeholder="Filtrar compromissos...">
                            <button type="submit">Buscar</button>
                        </form>
                    </div>
                    <div class="perfil-topo">
                        <span><?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></span>
                    </div>
                </div>

                <div class="titulo-secao">
                    <div>
                        <h1>Meus Compromissos</h1>
                        <p>Veja o que você tem agendado para os próximos dias.</p>
                    </div>
                    <a href="form_compromisso.php" class="btn-novo">+ Novo Compromisso</a>
                </div>
            </header>

            <div class="container-lista">

                <?php if (count($compromissos) > 0): ?>
                    <?php foreach ($compromissos as $row):
                        $data_objeto = new DateTime($row['data_compromisso']);
                        $dia = $data_objeto->format('d');
                        $mes_numero = $data_objeto->format('m');
                        $mes_texto = $meses_pt[$mes_numero] ?? 'AGD';

                        $hora_formatada = date('H:i', strtotime($row['hora_compromisso']));

                        $cor_atual = $cores[$index_cor % 4];
                        $index_cor++;
                    ?>
                        <div class="card-compromisso">
                            <div class="data-badge <?php echo $cor_atual; ?>">
                                <span class="dia"><?php echo $dia; ?></span>
                                <span class="mes"><?php echo $mes_texto; ?></span>
                            </div>
                            <div class="info-compromisso">
                                <h3><?php echo htmlspecialchars($row['titulo']); ?></h3>
                                <p><img src="../../public/img/relogio.png" class="mini-icon"> <?php echo $hora_formatada; ?></p>
                                <?php if (!empty($row['descricao'])): ?>
                                    <small style="color: #888; display: block; margin-top: 4px;"><?php echo htmlspecialchars($row['descricao']); ?></small>
                                <?php endif; ?>
                            </div>

                            <div class="tag-categoria tag-<?php echo $cor_atual; ?>">Agenda</div>

                            <div class="acoes-compromisso">
                                <a href="form_compromisso.php?id=<?php echo $row['id']; ?>" class="btn-edit" title="Editar">✎</a>
                                <a href="../controllers/excluir_compromisso.php?id=<?php echo $row['id']; ?>" class="btn-check" title="Concluir" onclick="return confirm('Deseja concluir este compromisso?');">✓</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="text-align: center; padding: 30px; color: #777; background: #fff; border-radius: 12px; border: 1px solid #e0e0e0;">
                        Nenhum compromisso encontrado.
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>

</html>