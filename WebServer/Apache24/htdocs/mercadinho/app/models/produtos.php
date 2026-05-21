<?php
    class Produtos
    {
        private string $nome;
        private string $preco;
        private string $quantidade;
       
        public function cadastrarProdutos($nomeProduto,$precoProduto, $quantidadeProduto)
        {   
            $this->nome = $nomeProduto;
            $this->preco = $precoProduto;
            $this->quantidade= $quantidadeProduto;

            require_once("conectarMercadinho.php");
            $obj = new Connect();
            $pdo = $obj->conectarBanco();

            $sql = "INSERT INTO produtos (nome, preco, quantidade) VALUES (:nome, :preco, :quantidade);";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':nome',$this->nome);
            $stmt->bindValue(':preco',$this->preco);
            $stmt->bindValue(':quantidade',$this->quantidade);

            if($stmt->execute())
            {
                return TRUE;
            }    
            else
            {
                return FALSE;
            }              


        }

        public function listaProdutos()
        {
            require_once("conectarMercadinho.php");

            $obj = new Connect();
            $pdo = $obj->conectarBanco();

            $sql = "SELECT * From produtos;";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $tuplas = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
           return $tuplas;
        }
    }
?>