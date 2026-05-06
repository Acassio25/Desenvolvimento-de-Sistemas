<?php

    class SistemaBanco
    {
        private $usuario;
        private $saldo;

        public function setAbrirConta($nome)
        {
            $this->usuario=$nome;
            $this->saldo=1000.00;
        }
        public function setSacar($nome, $valor)
        {

            if($this->saldo >= $valor)
            {
                $this->usuario=$nome;
                $this->saldo-=$valor;
                return ("Saque realizado com sucesso!");
            }
            else
            {
                return("Saldo Insuficiente!");

            }
        }
        public function setDepositar($nome, $valor)
        {
            $this->usuario=$nome;
            $this->saldo+=$valor;

            return("Deposito relizado com sucesso!");
        }
        

        public function getSaldoUsuario()
        {
            return "O nome do cliente é: ".$this->usuario."<br />".
            "Seu saldo é: ".$this->saldo."<br />";
        }

    }

?>
    <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco Sesi</title>
</head>
<body>
    <form method="post" action="SistemaBanco.php">
        <label>Usuário</label>
        <input type="text" name="nome"/>
        <br />
        <label>Valor</label>
        <input type="number" name="valor" require/>
        <br />
        <input type="submit" name="sacar" value="Sacar"/>
        <input type="submit" name="depositar" value="Depositar"/>
    </form>
</body>
</html>

<?php 

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $minhaConta = new SistemaBanco();
        $minhaConta->setAbrirConta($_POST["nome"]);

    }
    if(isset($_POST["sacar"]))
    {
        echo $minhaConta->setSacar($_POST["nome"],$_POST["valor"]);
    }
    else
    {
        echo $minhaConta->setDepositar($_POST["nome"],$_POST["valor"]);
    }
    echo $minhaConta->getSaldoUsuario();
?>