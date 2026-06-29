<?php

    class User
    {
        private string $login;
        private string $password;
        private object $pdo;

        public function __construct()
        {
            include_once("Connect.php");
            $conexao = new Connect();
            $this->pdo = $conexao->conectarBanco(); 
        }
        
        public function ValidarLogin($email, $senha)
        {
            $this->login = $email;
            $this->password = $senha;

            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND ativo = TRUE;";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email',$this->login);
            $stmt->bindParam(':senha',$this->password);
            $stmt->execute();

            $vetor = $stmt->fetch(PDO::FETCH_ASSOC);
            if(isset($vetor["email"]) && ($vetor["senha"]))
            {
               return($vetor);
            }
            else
            {
                return (FALSE);
            }
        }

        public function ListarTodosUsuarios()
        {
            $sql = "Select * FROM usuarios;";
            $stmt = $this->pdo->prepare($sql);
            if($stmt->execute())
            {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return($result);
            }
            else
            {
                return(FALSE);
            }
        }
        
        public function ListarUmUsuario($id_usuario)
        {
            $sql = "Select * FROM usuarios WHERE id_usuarios = :id ORDER BY id_usuarios ASC;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id_usuario);
            
            if($stmt->execute())
            {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return($result);
            }
            else
            {
                return(FALSE);
            }
        }

        public function EditarUsuario($id_usuario,$email)
        {
            $sql = "UPDATE usuarios SET email = :email WHERE id_usuarios = :id;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id_usuario);
            $stmt->bindParam(':email', $email);
            if($stmt->execute())
            {
             echo '<script>
                   alert("Usuario atualizado com sucesso.");
                   window.location.href="http://localhost/agenda/app/views/cadastro.php";
                </script>';
            }
            else
            {
                echo 'Erro';
            }
        }
        
        public function DeleteUsuario($id_usuario,$email)
        {
          $sql = "Delete FROM usuarios WHERE id_usuarios = :id;";
          $stmt = $this->pdo->prepare($sql);
          $stmt->bindParam(':id',$id_usuario);
          if($stmt->execute())
          {
            echo '<script>
                   alert("Usuario Deletado com sucesso.");
                   window.location.href="http://localhost/agenda/app/views/cadastro.php";
                </script>';
          }
          else
          {
             echo 'Erro';
          }
        }

        
        public function CadastrarUsuario($nome, $telefone, $email, $senha)
        {
            // Query contendo os novos campos pedidos (nome, telefone)
            $sql = "INSERT INTO usuarios (nome, telefone, email, senha, ativo) VALUES (:nome, :telefone, :email, :senha, 'true');";
            $stmt = $this->pdo->prepare($sql);
            
            // Vinculação dos 4 parâmetros vindos do formulário externo
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha); // Mantida a senha direta conforme seu padrão original

            if($stmt->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
        }

    }
?>