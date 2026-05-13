<?php
    class Aluno
    {
        private string $nome;
        private string $email;
       
        public function cadastrarAluno($nomeAluno, $emailAluno)
        {   
            require_once("Conect.php");
            $obj = new Conect();
            $pdo = $obj->conectarBanco();

            $sql = "INSERT INTO alunos (nome, email) VALUES (:nome, :email);";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':nome',$nomeAluno);
            $stmt->bindValue(':email',$emailAluno);

            $stmt->execute();

            echo "Aluno Cadastrado com sucesso."; 

        }
    }
?>