<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css" type="text/css">

    <title>Produtos</title>
</head>

<body>

    <div class="cad">
        <h1>Cadastro de Produtos</h1>

        <form action="salvarProdutos.php" method="post">

            <label>Nome do Produto</label> <br />
            <input type="text" name="nome" placeholder="Digite o produto" required />
            <br />

            <label>Quantidade</label>
            <br />
            <input type="number" name="quantidade" placeholder="Digite a quantidade" required />
            <br />
            <label>Preço</label>
            <br />
            <input type="text" name="preco" placeholder="Digite o preço" required />
            <br><br />

            <button type="submit">Cadastrar Produto</button>

        </form>

    </div>
</body>

</html>