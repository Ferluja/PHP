<?php
    include "../clases/Conexion.php";
    $id_pais = $_POST['id_pais'];
    $nombre_pais = $_POST['txt_nombrePais'];
    $url = $_POST['txt_urlImagen'];
    $id_continente = $_POST['listaPaises'];
    function actualizar_pais($nombrePais, $ruta, $idContinente, $idPais){
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "UPDATE t_paises
                SET nombre_pais = '$nombrePais', ruta_bandera = '$ruta', id_continente = '$idContinente' WHERE id_pais = '$idPais'";
        $resultado = mysqli_query($conexion, $sql);
        return $resultado;        
    }
    if(actualizar_pais($nombre_pais, $url, $id_continente, $id_pais)){
        header("location:../mostrar_paises/tabla_continentes_paises.php");
    }else{
        echo "Fallo actualizacion";
    }
?>