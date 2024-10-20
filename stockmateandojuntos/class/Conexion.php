<?php
    class Conexion{
        protected $servidor = "localhost";
        protected $usuario = "root";
        protected $pass = "";
        protected $nombre_base_datos = "stockmateando";
        protected $conn;

        function __construct()
        {
            try{
                $this->conn = new PDO("mysql:host=$this->servidor;dbname=$this->nombre_base_datos",$this->usuario,$this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e) {
                header("Location: ./utils/error.php");
                exit();
            }
        }
        public function getConexion(){
            return $this->conn;
        }
    }