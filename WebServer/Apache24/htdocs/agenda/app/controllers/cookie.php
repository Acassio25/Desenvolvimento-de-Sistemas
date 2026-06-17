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