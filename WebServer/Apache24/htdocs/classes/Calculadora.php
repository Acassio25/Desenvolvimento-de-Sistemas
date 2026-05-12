<?php

    class Calculadora
    {
        private $num1;
        private $num2;
        private $resultado;

        public function setSoma($A, $B)
        {
            $this->num1=$A;
            $this->num2=$B;
            $this->resultado=$A + $B;
        }

        public function setSubtracao($A, $B)
        {
            $this->num1=$A;
            $this->num2=$B;
            $this->resultado=$A - $B;
        }
        public function setMultiplicacao($A, $B)
        {
            
            $this->num1=$A;
            $this->num2=$B;
            $this->resultado=$A * $B;
        
        }
        public function setDivisao($A, $B)
        {
            if ($B == 0) 
            {
                $this->resultado = "Erro: Divisão por zero";
            }
            else
            {
                $this->num1=$A;
                $this->num2=$B;
                $this->resultado=$A / $B;
            }   
            
        }

        public function getresultado()
        {
            return $this->resultado;
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <p>Primeira Calculadora PHP</p>
    <form method="post"  action="Calculadora.php">

     <label>Primeiro número</label><br />
     <input type="number" name="num1" required/><br />
     <label>Segundo número</label><br />

     <input type="number" name="num2" required/><br />

     <input type="submit" name="adicao" value="+">
     <input type="submit" name="subtracao" value="-">
     <input type="submit" name="multiplicacao" value="*">
     <input type="submit" name="divisao" value="/">
    </form>
    
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $minhaCalculadoa = new Calculadora();
    if(isset($_POST["adicao"]))
    {
    $minhaCalculadoa->setSoma($_POST["num1"],$_POST["num2"]);
    }
    elseif(isset($_POST["subtracao"]))
    {
        $minhaCalculadoa->setSubtracao($_POST["num1"],$_POST["num2"]);
    }
    elseif(isset($_POST["multiplicacao"]))
    {
        $minhaCalculadoa->setMultiplicacao($_POST["num1"],$_POST["num2"]);
    }
    elseif(isset($_POST["divisao"]))
    {
        $minhaCalculadoa->setDivisao($_POST["num1"],$_POST["num2"]);
    }

    echo $minhaCalculadoa->getresultado();
}

?>