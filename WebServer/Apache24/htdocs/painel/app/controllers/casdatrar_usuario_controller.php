<?php
    if($_SERVER["REQUEST_METHOD"]  == "POST")
    {
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        include_once("../models/User.php");

        if (empty($email) || empty($senha)) {
        echo '<script>
                alert("Erro: O e-mail e a senha são obrigatórios!");
                window.history.back(); // Volta para o formulário
              </script>';
        exit; 
    }

        $obj = new User();
        $obj->CadastrarUsuario($email,$senha);

    }
?>