<?php 

    class Conexion{
        private $conex;

        public function __construct()
        {
            $pdo = "mysql:host=".host.";dbname=".db.";.charset."; 
            try {
                $this->conex = new PDO($pdo, user, pass);
                $this->conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                echo "Error en la Conexion...".$e->getMessage();
            }
        }

        public function conex()
        {
            return $this->conex;
        }
    }

?>