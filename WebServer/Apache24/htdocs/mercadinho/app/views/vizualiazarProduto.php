<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
     include_once("produtos.php");
     $obj = new Produtos();
     $exec = $obj->listaProdutos();

    if (!$exec) 
    {
        $exec = [];
    }
} 
else
{
    header("Location: cadastro_produtos.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>

<body>
    <Table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exec as $produtos): ?>
                <tr>
                    <td><?= $produtos["id_produto"]; ?></td>
                    <td><?= $produtos["nomeProduto"]; ?></td>
                    <td><?= $produtos["precoProduto"]; ?></td>
                    <td><?= $produtos["quantidadeProduto"] ?></td>
                    <td></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </Table>
    <a href="cadastro_produtos.php"><button>VOLTAR</button></a>
</body>

</html>