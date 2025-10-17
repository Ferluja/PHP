<?php
    include "../clases/Conexion.php";
    include "../clases/Crud.php";
    $crud = new Crud();
    $continente_p = $_POST['listaPaises'];
    $nombre_pais_p = $_POST['txt_nombrePais'];
    $url_imagen = $_POST['txt_urlImagen'];

    function insertar($continente, $nombrePais, $urlImg){
        $c = new Conexion;
        $conexion = $c->conectar();

        $sql = "INSERT INTO t_paises(nombre_pais,ruta_bandera,id_continente)VALUES('$nombrePais','$urlImg','$continente')";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }
    if($crud->buscarRepetidos($nombre_pais_p)==1){
        echo "Tas mal, repetido";
    }else if (insertar($continente_p,$nombre_pais_p,$url_imagen)) {
        header("location:../mostrar_paises/tabla_continentes_paises.php");    
    }
?>