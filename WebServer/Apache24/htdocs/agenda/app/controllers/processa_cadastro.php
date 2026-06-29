<?php
require_once("../models/User.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome     = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $email    = trim($_POST['email']);
    $senha    = trim(md5($_POST['senha']));

    if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha)) {
        
        $usuarioModel = new User();

        $sucesso = $usuarioModel->CadastrarUsuario($nome, $telefone, $email, $senha);

        if ($sucesso) {
            echo '<script>
                    alert("Usuário cadastrado com sucesso!");
                    window.location.href = "http://localhost/agenda/app/dashboard.php";
                  </script>';
        } else {
            echo '<script>
                    alert("Erro ao salvar no banco de dados.");
                    window.history.back();
                  </script>';
        }

    } else {
        echo '<script>
                alert("Preencha todos os campos.");
                window.history.back();
              </script>';
    }
    } else {
     header("Location: cadastro.php");
     exit();
    }
?>