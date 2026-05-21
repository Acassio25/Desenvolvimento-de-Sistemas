<?php

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require_once("produtos.php");
        $obj = new Produtos();

        $exec = $obj->cadastrarProdutos($_POST["nome"], $_POST["preco"],$_POST["quantidade"]);


        if($exec == TRUE)
        {
            $msg = "Produto cadastrado com sucesso!";
        
        }
        else
        {
            $msg = "Algo deu Errado tente novamente";
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
    <meta http-equiv="refresh" content="3;url=cadastro_produtos.php">

    <title>Resultado</title>
</head>
<body>
    <h2><?= $msg; ?></h2>

    <p>Redirecionando...</p>
    
</body>
</html>