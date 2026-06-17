<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Meu Perfil</title>
    <link rel="stylesheet" href="../../public/css/style_dashboard.css">
    <link rel="stylesheet" href="../../public/css/style_perfil.css">
</head>

<body>
    <div class="principal">
        <aside class="aside-menu">
            <h2>Minha Agenda</h2>
            <ul>
                <li><a href="dashboard.php"><img class="img-cont" src="../../public/img/dashboard.png" alt="">Dashboard</a></li>
                <li><a href="contatos.php"><img class="img-cont" src="../../public/img/contato.png" alt="">Contatos</a></li>
                <li><a href="compromissos.php"><img class="img-cont" src="../../public/img/compromisso.png" alt="compromisso"> Compromissos</a></li>
                <li><a href="perfil.php" class="active"><img class="img-cont" src="../../public/img/perfil.png" alt="">Perfil</a></li>
                <li><a href="#"><img class="img-cont" src="../../public/img/configuracao.png" alt="">Configurações</a></li>
                <li><a href="#"><img class="img-cont" src="../../public/img/sair.png" alt="">Sair</a></li>
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
                        <span>Administrador</span>
                    </div>
                </div>
                
                <div class="titulo-secao">
                    <div>
                        <h1>Meu Perfil</h1>
                        <p>Gerencie suas informações cadastrais e segurança da conta.</p>
                    </div>
                </div>
            </header>

            <div class="card-perfil">
                <form action="/salvar-perfil" method="POST">
                    
                    <div class="layout-perfil">
                        <div class="coluna-foto">
                            <div class="avatar-perfil">
                                <span>AD</span>
                            </div>
                            <label class="btn-foto" for="foto">Alterar Foto</label>
                            <input type="file" name="imagem" id="foto" hidden />
                        </div>

                        <div class="coluna-dados">
                            <h2 class="subtitulo-form">Dados Pessoais</h2>
                            <div class="grid-campos">
                                <div class="campo-grupo">
                                    <label for="nome">Nome Completo</label>
                                    <input type="text" id="nome" name="nome" value="Administrador Padrão">
                                </div>
                                
                                <div class="campo-grupo">
                                    <label for="email">E-mail</label>
                                    <input type="email" id="email" name="email" value="admin@email.com">
                                </div>

                                <div class="campo-grupo">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" id="telefone" name="telefone" value="(11) 99999-9999">
                                </div>
                            </div>

                            <hr class="linha-divisoria">

                            <h2 class="subtitulo-form">Alterar Senha</h2>
                            <div class="grid-campos">
                                <div class="campo-grupo">
                                    <label for="senha_atual">Senha Atual</label>
                                    <input type="password" id="senha_atual" name="senha_atual" placeholder="••••••••">
                                </div>
                                
                                <div class="campo-grupo">
                                    <label for="nova_senha">Nova Senha</label>
                                    <input type="password" id="nova_senha" name="nova_senha" placeholder="Digite a nova senha">
                                </div>
                            </div>

                            <div class="container-botao">
                                <button type="submit" class="btn-salvar">Salvar Alterações</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>