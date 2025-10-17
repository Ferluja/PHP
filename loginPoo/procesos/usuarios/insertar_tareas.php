<?php

include "../../clases/Conexion.php";
include "../../clases/Usuario.php";
session_start();

$nombre_tarea = $_POST['up_namehomework'];
$fecha_actual = $_POST['up_date_start'];
$fecha_final = $_POST['up_date_end'];
$hora_inicio = $_POST['up_hour_start'];
$hora_fin = $_POST['up_hour_end'];

$comentarios = $_POST['up_comments'];
$obj = new Usuario();
$respuesta = $obj->insert_homework($nombre_tarea, $fecha_actual, $fecha_final, $hora_inicio, $hora_fin,$comentarios, 0);
if($respuesta){
    $_SESSION['insertado_tarea'] = 1;
    

}else{
    $_SESSION['insertado_tarea'] = 2;
    
}
header("location:../../vistas-panel/inicio.php");


?>