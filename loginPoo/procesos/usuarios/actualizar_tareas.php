<?php

include "../../clases/Conexion.php";
session_start();

$id_tarea = $_POST['input_id'];
$nombre_tarea = $_POST['input_namehomework'];
$fecha_inicio = $_POST['input_date_start'];
$fecha_final = $_POST['input_date_end'];
$hora_inicio = $_POST['input_hour_start'];
$hora_fin = $_POST['input_hour_end'];
$comentarios = $_POST['input_comments'];

function update_homework($name_homework, $date_start, $date_end, $hour_start, $hour_end, $comments, $id_homework){
    $c = new Conexion();
    $conexion = $c->conectar();
    $sql = "UPDATE t_tareas 
    SET nombre_tarea = '$name_homework',fecha_inicio = '$date_start', fecha_fin = '$date_end', hora_asignacion = '$hour_start', hora_terminacion = '$hour_end', comentarios = '$comments' 
    WHERE id_tarea = '$id_homework'";
    $resultado = mysqli_query($conexion, $sql);
    return $resultado;
}

$respuesta = update_homework($nombre_tarea, $fecha_inicio, $fecha_final, $hora_inicio, $hora_fin, $comentarios, $id_tarea);

if($respuesta){
    $_SESSION['actualizar_tarea'] = 5;
    

}else{
    $_SESSION['actualizar_tarea'] = 6;
    
}
header("location:../../vistas-panel/inicio.php");


?>