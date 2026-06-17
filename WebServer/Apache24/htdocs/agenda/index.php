<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="public/css/style_index.css">
</head>
<body>
    <div class="conteiner">
        
        <div class="lado-esq">
            <div class="texto-boas-vindas">
                <h1>Agenda</h1>
                <h1>Eletrônica</h1>
                <h3>Tudo organizado e na palma da mão!!</h3>
            </div>
        </div>
        
        <div class="lado-dir">
            <form action="processa_login.php" method="POST"> 
                <h2>Login</h2>
                
                <div class="input-login">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="seu@email.com" required>

                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Sua senha" required>
                </div>  
               
                <div class="checkbox-login">
                    <input type="checkbox" id="lembrar" name="lembrar" value="1">
                    <label for="lembrar">Lembrar de mim</label>
                </div>

                <button type="submit" class="btn-enviar">Entrar</button>
            </form>

            <div class="link-cadastro">
                <p>Não tem uma conta? <a href="../agenda/app/views/cadastro.php">Cadastrar-se aqui</a></p>
            </div>
        </div>

    </div>
</body>
</html>