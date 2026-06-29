<?php

    class Compromisso_mod
    {
        private object $pdo;

        public function __construct()
        {
            include_once("Connect.php");
            $conexao = new Connect();
            $this->pdo = $conexao->conectarBanco();
        }

        public function ListarCompromissos($id_usuario, $busca = '')
        {
            if(!empty($busca))
            {
                $sql = "SELECT * FROM compromissos WHERE id_usuario = :id_usuario AND (titulo LIKE :busca OR descrissao LIKE :busca) ORDER BY data_compromisso ASC, hora_compromisso ASC;";
                $stmt = $this->pdo->prepare($sql);
                $buscaParam = "%" . $busca . "%";
                $stmt->bindParam(':id_usuario', $id_usuario);
                $stmt->bindParam(':busca', $buscaParam);
            }
            else
            {
                $sql = "Select *From compromissos Where id_usuario = :id_usuario Order By data_compromisso Asc, hora_compromisso Asc;";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':id_usuario', $id_usuario);

            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function ListarCompromisso($id, $id_usuario)
        {
            $sql = "SELECT * FROM compromissos WHERE id = :id AND id_usuario = :id_usuario;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);  
        }
        public function CadastrarCompromisso($id_usuario, $titulo, $descricao, $data_compromisso, $hora_compromisso)
        {
            $sql = "INSERT INTO compromissos (id_usuario, titulo, descricao, data_compromisso, hora_compromisso) VALUES (:id_usuario, :titulo, :descricao, :data_compromisso, :hora_compromisso);";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':data_compromisso', $data_compromisso);
            $stmt->bindParam(':hora_compromisso', $hora_compromisso);
            return $stmt->execute();
        }
        public function EditarCompromisso($id, $id_usuario, $titulo, $descricao, $data_compromisso, $hora_compromisso)
        {
            $sql = "UPDATE compromissos SET titulo = :titulo, descricao = :descricao, data_compromisso = :data_compromisso, hora_compromisso = :hora_compromisso WHERE id = :id AND id_usuario = :id_usuario;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':data_compromisso', $data_compromisso);
            $stmt->bindParam(':hora_compromisso', $hora_compromisso);
            return $stmt->execute();
        }

        public function DeleteCompromisso($id, $id_usuario)
        {
            $sql = "DELETE FROM compromissos WHERE id = :id AND id_usuario = :id_usuario;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':id_usuario', $id_usuario);
            return $stmt->execute();
        }

        public function ListarUmCompromisso($id, $id_usuario)
        {
            $sql = "SELECT * FROM compromissos WHERE id = :id AND id_usuario = :id_usuario;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->execute();
    
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        

    }


?>