<?php
    class Crud extends Conexion {
        public function listaContinentesPaises(){
            $id_continente = $_POST['listaPaises'];
            $conexion = parent::conectar();

            $sql = "SELECT * FROM v_continentesPaises WHERE idContinente = '$id_continente'";

            $respuesta = mysqli_query($conexion, $sql);

            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);

        }
        public function listaContinentesPaisesTotales(){
            $conexion = parent::conectar();
            $sql = "SELECT * FROM v_continentesPaises";
            $respuesta = mysqli_query($conexion, $sql);
            return $respuesta;
        }
        public function buscarRepetidos($nombre_pais){
            $c = new Conexion();
            $conexion = $c->conectar();
            $sql = "SELECT * FROM t_paises WHERE nombre_pais = '$nombre_pais'";
            $result=mysqli_query($conexion, $sql);
            if (mysqli_num_rows($result) > 0) {
                return 1;
            }else{
                return 0;
            }
        }
        public function listaMapa(){
            $id_continente = $_GET['id_con'];
            $conexion = parent::conectar();

            $sql = "SELECT * FROM v_continentesPaises WHERE idContinente = '$id_continente'";

            $respuesta = mysqli_query($conexion, $sql);

            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);

        }

    }
?>