<?php
    session_start();
    include "../../clases/Conexion.php";
    include "../../clases/Usuario.php";
    $usuario_insert = $_POST['up_user'];  
    $password_insert = sha1($_POST['up_password']);
    $nombre = $_POST['up_name'];
    $apellido_paterno = $_POST['up_plastname'];
    $apellido_materno = $_POST['up_mlastname'];

    $obj = new Usuario();
    $respuesta = $obj->insert_user($usuario_insert, $password_insert, $nombre, $apellido_paterno, $apellido_materno);
    if($respuesta){
        
        $_SESSION['insertado'] = 1;
        //header("location:../../index.php");
    }else{
        
        $_SESSION['insertado'] = 2;
    }
    header("location:../../index.php");
?>