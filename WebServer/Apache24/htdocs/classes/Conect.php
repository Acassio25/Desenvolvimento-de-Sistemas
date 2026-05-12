<?php
    class Conect
    {
        private $host; //endereço onde o servidor de banco de dados está instalado.
        private $dbname; //nome do data base que iremos utilizar. 
        private $password;//senha do meu banco de dados.
        private $user;//é o usuario do banco de dados, no postgre é postgres.
        private $port;//porta onde é executado as conexão com o banco de dados, o padrão é 5432.
        
        function __construct()
        {
            $this->host = "localhost";
            $this->dbname = "teste";
            $this->password = "123456";
            $this->user = "postgres";
            $this->port = "5432";
        }

        public function conectarBanco()
        {
            try
            {
                $PDO = new PDO("pgsql:host=".$this->host.";port=".$this->port.";dbname=".$this->dbname,$this->user,$this->password);
                echo "Eu sou bom de+++";
                return($PDO);
            }
            catch(PDOException $erro)
            {
                $msn = "Falha no acesso com o PostGres: ".$erro->getMessage();
                echo $msn;
                return(NULL);
            }
        }

    }


?>
