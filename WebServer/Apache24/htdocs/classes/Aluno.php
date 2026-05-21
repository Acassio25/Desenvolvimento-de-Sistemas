<?php
    class Aluno
    {
        private string $nome;
        private string $email;
       
        public function cadastrarAluno($nomeAluno, $emailAluno)
        {   
            $this->nome = $nomeAluno;
            $this->email = $emailAluno;

            require_once("Conect.php");
            $obj = new Conect();
            $pdo = $obj->conectarBanco();

            $sql = "INSERT INTO alunos (nome, email) VALUES (:nome, :email);";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':nome',$this->nome);
            $stmt->bindValue(':email',$this->email);

            if($stmt->execute())
            
                return TRUE;
            else               
                return FALSE;

        }

        public function listaralunos()
        {
            require_once("Conect.php");

            $obj = new Conect();
            $pdo = $obj->conectarBanco();

            $sql = "SELECT * From alunos;";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $tuplas = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
           return $tuplas;
        }
    }
?>