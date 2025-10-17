<?php
include "../../clases/Conexion.php";
$id_tarea = $_GET['id_tarea'];
session_start();
function delete_homework($id_recibido){
    
    $c = new Conexion();
    $conexion = $c->conectar();
    $sql = "DELETE FROM t_tareas WHERE id_tarea = '$id_recibido'";
    $resultado = mysqli_query($conexion, $sql);
    return $resultado;
}
$respuesta = delete_homework($id_tarea);
if($respuesta){
    $_SESSION['borrar_tarea'] = 3;
}else{
    $_SESSION['borrar_tarea'] = 4;
}
header("location:../../vistas-panel/inicio.php");
?>