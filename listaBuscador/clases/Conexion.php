<?php
    class Conexion{
        public function conectar(){
            try{
                return mysqli_connect(
                    'localhost',
                    'admin',
                    'root',
                    'continentes'
                );
            }catch(\Throwable $th){
                return $th->getMessage();
            }
        }
    }
?>