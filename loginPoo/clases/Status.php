<?php
include "./Conexion.php";
$id = $_GET['s_id']; 
    function update_status($id_homework)
    {

        $status = 1;
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "UPDATE t_tareas 
                  SET status = '$status'
                WHERE id_tarea = '$id_homework'";
        $resultado = mysqli_query($conexion, $sql);
        return $resultado;
    }
        
    $respuesta = update_status($id);
    
    if($respuesta){
            header("location:../vistas-panel/inicio.php");

    }
?>