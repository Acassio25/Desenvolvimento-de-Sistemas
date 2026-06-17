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
                <li><a href="#"><img class="img-cont" src="../../public/img/sair.png" alt="">Sair</a></li>
            </ul>
        </aside>

        <div class="main-content">
            <header class="content-header">
                <div class="topo-flex">
                    <div class="pesquisa-topo">
                        <form action="/buscar-contato" method="GET">
                            <input type="text" name="busca" placeholder="Pesquisar contato!!">
                            <button type="submit">Buscar</button>
                        </form>
                    </div>
                    <div class="perfil-topo">
                        <span>Administrador</span>
                    </div>
                </div>
                
                <div class="titulo-pagina-contatos">
                    <div>
                        <h1>Meus Contatos</h1>
                        <p>Gerencie sua lista de contatos salvos.</p>
                    </div>
                    <button class="btn-adicionar">+ Novo Contato</button>
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
                        <tr>
                            <td><div class="avatar-letra">MS</div></td>
                            <td><strong>Maria Silva</strong></td>
                            <td>(11) 98888-5555</td>
                            <td>maria.silva@email.com</td>
                            <td>
                                <button class="btn-acao btn-editar">Editar</button>
                                <button class="btn-acao btn-excluir">Excluir</button>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="avatar-letra">CS</div></td>
                            <td><strong>Carlos Souza</strong></td>
                            <td>(11) 98888-7777</td>
                            <td>carlos.souza@email.com</td>
                            <td>
                                <button class="btn-acao btn-editar">Editar</button>
                                <button class="btn-acao btn-excluir">Excluir</button>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="avatar-letra">AO</div></td>
                            <td><strong>Ana Oliveira</strong></td>
                            <td>(11) 97777-6666</td>
                            <td>ana.oliveira@email.com</td>
                            <td>
                                <button class="btn-acao btn-editar">Editar</button>
                                <button class="btn-acao btn-excluir">Excluir</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>