<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $login = $_POST["user"];
    $password = md5($_POST["pass"]);

    require_once("../models/User.php");
    $obj = new User();
    $exer = $obj->getUser($login, $password);

    if ($exer == TRUE) {
        $msg = "Login realizado com sucesso!";
    } else {
        $msg = "Senha ou usuário invalido";
    }
}
else
{
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;url=../views/cadastro_produtos.php">

    <title>Resultado</title>
</head>
<body>
    <h2><?= $msg; ?></h2>

    <p>Redirecionando...</p>
    
</body>
</html>