<?php
    session_name("agenda");
    session_start();

    if($_SERVER["REQUEST_METHOD"]  == "POST")
    {
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);

        include_once("../models/User.php");

        $obj = new User();
        $resp = $obj->ValidarLogin($email,$senha);

        if($resp == TRUE)
        {
            $_SESSION["usuario_id"]   = $resp["id_usuarios"];
            $_SESSION["usuario_nome"] = $resp["nome"];

            header("Location: ../views/dashboard.php");
            exit();
        }
        else
        {
            echo '<script>
                    
                    
                 alert("Senha ou Usuário inválido, tente novamente.");
                 window.location.href="http://localhost/agenda/index.php";
                
                </script>';

        }

    }
?>