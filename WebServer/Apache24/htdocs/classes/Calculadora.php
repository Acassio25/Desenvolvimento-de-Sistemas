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
            $this->num1=$A;
            $this->num2=$B;
            $this->resultado=$A / $B;
            if ($B = 0) 
            {
                echo "Erro: Divisão por zero";
            }
        }

    }

?>