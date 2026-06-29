<?php
session_name("agenda");
session_start();

if($_SERVER["REQUEST_METHOD"] == 'POST')
{
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $login_valido = true; 

    if($login_valido) {
        
        $_SESSION['usuario_id'] = 1; 
        $_SESSION['usuario_nome'] = "Administrador"; 

        
        if(isset($_POST["lembrar"]))
        {
            $valor = base64_encode($email);
            $duracao = strtotime("+ 1 day");
            
            setcookie("lembrar", $valor, $duracao, "/");
        }
        else
        {
            
            setcookie("lembrar", "", time() - 3600, "/");
        }

        header("Location: ../views/dashboard.php");
        exit();
    }
}
?>