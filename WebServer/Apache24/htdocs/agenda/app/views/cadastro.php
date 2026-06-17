<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Agenda</title>
    <link rel="stylesheet" href="../../public/css/style_cadastro.css">
</head>
<body>

    <div class="cadastro-container">
        <h2>Criar Conta</h2>
        <p>Preencha os campos abaixo para se cadastrar na Agenda.</p>

        <form action="../controllers/processa_cadastro.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" required placeholder="Ex: João Silva">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" required placeholder="Ex: (11) 99999-9999">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required placeholder="Ex: joao@email.com">
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required placeholder="••••••••">
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

</body>
</html>