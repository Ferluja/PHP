<?php
include "../clases/Conexion.php";

$id_pais = $_POST['id_pais'];

//print_r($_POST);
function eliminar_pais($idPais){
    $c = new Conexion();
    $conexion = $c->conectar();
    $sql = "DELETE FROM t_paises WHERE id_pais = '$idPais'";
    $resultado = mysqli_query($conexion, $sql);
    return $resultado;
}
if(eliminar_pais($id_pais)){
   header("location:../mostrar_paises/tabla_continentes_paises.php"); 
}else{
    echo "Fallo al eliminar";
}
?>