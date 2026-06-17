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
                <li><a href="#"><img class="img-cont" src="../../public/img/sair.png" alt="">Sair</a></li>
            </ul>
        </aside>

        <div class="main-content">
            <header class="content-header">
                <div class="topo-flex">
                    <div class="pesquisa-topo">
                        <form action="/buscar-agenda" method="GET">
                            <input type="text" name="busca" placeholder="Filtrar compromissos...">
                            <button type="submit">Buscar</button>
                        </form>
                    </div>
                    <div class="perfil-topo">
                        <span>Administrador</span>
                    </div>
                </div>
                
                <div class="titulo-secao">
                    <div>
                        <h1>Meus Compromissos</h1>
                        <p>Veja o que você tem agendado para os próximos dias.</p>
                    </div>
                    <button class="btn-novo">+ Novo Compromisso</button>
                </div>
            </header>

            <div class="container-lista">
                
                <div class="card-compromisso">
                    <div class="data-badge azul">
                        <span class="dia">20</span>
                        <span class="mes">JUN</span>
                    </div>
                    <div class="info-compromisso">
                        <h3>Reunião de Alinhamento</h3>
                        <p><img src="../../public/img/relogio.png" class="mini-icon"> 14:00</p>
                    </div>
                    <div class="tag-categoria tag-azul">Trabalho</div>
                    <div class="acoes-compromisso">
                        <button class="btn-check" title="Concluir">✓</button>
                        <button class="btn-edit" title="Editar">✎</button>
                    </div>
                </div>

                <div class="card-compromisso">
                    <div class="data-badge vermelho">
                        <span class="dia">21</span>
                        <span class="mes">JUN</span>
                    </div>
                    <div class="info-compromisso">
                        <h3>Dentista - Limpeza</h3>
                        <p><img src="../../public/img/relogio.png" class="mini-icon"> 09:30</p>
                    </div>
                    <div class="tag-categoria tag-vermelho">Saúde</div>
                    <div class="acoes-compromisso">
                        <button class="btn-check" title="Concluir">✓</button>
                        <button class="btn-edit" title="Editar">✎</button>
                    </div>
                </div>

                <div class="card-compromisso">
                    <div class="data-badge verde">
                        <span class="dia">23</span>
                        <span class="mes">JUN</span>
                    </div>
                    <div class="info-compromisso">
                        <h3>Aniversário do Pedro</h3>
                        <p><img src="../../public/img/relogio.png" class="mini-icon"> 19:00</p>
                    </div>
                    <div class="tag-categoria tag-verde">Pessoal</div>
                    <div class="acoes-compromisso">
                        <button class="btn-check" title="Concluir">✓</button>
                        <button class="btn-edit" title="Editar">✎</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>