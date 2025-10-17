<?php

    class Conexion{
        private $servidor = "localhost";
        private $usuario = "admin";
        private $password = "root";
        private $bd = "tareas";

        public function conectar(){
            try{  
                $conexion = mysqli_connect(
                    $this->servidor,
                    $this->usuario,
                    $this->password,
                    $this->bd
                );
                return $conexion;
            }catch(\Throwable $th){
                return $th->getMessage();
        }
    }
}
?>
