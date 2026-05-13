<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
</head>
<body>
    <h1>Cadastro de Aluno</h1>
    <form method="post" action="salvar.php">
        <label>Nome do Aluno</label> <br/>
        <input type="text" name="nome" placeholder="Digite o nome"/>
        <br/>
        <label>E-mail</label> <br/>
        <input type="email" name="email" placeholder="Digite o e-mail" />
        <br/>
        <input type="submit" name="cadastro" value="Cadastrar"/>
    </form>
    
</body>
</html>