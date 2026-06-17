<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="cookie.php">
        <label for="">E-mail</label>
        <input type="email" name="email" require/>
        <label for="">Senha</label>
        <input type="password" name="senha">
        <label for="">
            <input type="checkbox" name="lembrar"/>
            Lembrar-me
        </label>
        <input type="submit" value="Entrar">
    </form>
    
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"] == 'POST')
    {
        $email = $_POST["email"];
        $senha =  $_POST["senha"];

        if(isset($_POST["lembrar"]))
        {
            $valor = base64_encode($email);
            $duracao = strtotime("+ 1 day");
            setcookie("lembrar",$valor,$duracao);
        }
    }

?>