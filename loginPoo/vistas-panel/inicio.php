<?php
include "../clases/Conexion.php";
include "../clases/Usuario.php";
$Usuario = new Usuario();
$c = new Conexion();
$conexion = $c->conectar();
$sql = "SELECT * FROM t_tareas";
$result = mysqli_query($conexion, $sql);

session_start();

function give_format_date($date)
    {
        $originalDate = $date;
        //original date is in format YYYY-mm-dd
        $DateTime = DateTime::createFromFormat('Y-m-d', $originalDate);
        $new_format_date = $DateTime->format('d-m-Y');
        return $new_format_date;
    }

if (isset($_SESSION['usuario'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!--Custom styles-->
        <link rel="stylesheet" type="text/css" href="../css/style_index.css">
        <title>Dashboard</title>
    </head>

    <body>


        <br>
        <div class="form-group">
            <a href="../procesos/usuarios/salir.php" type="submit" class="btn position-absolute top-0 end-0 login_btn">Log out</a>
        </div>
        <div class="form-group">
            <a href="../vistas-panel/registro_tarea.php" type="submit" class="btn position-absolute top-0 start-0 login_btn">Create homework</a>
        </div>
        <br>
        <br>
        <div class="container-fluid">
            <table class="table " style="color: white;text-align:center">
                <thead>
                    <tr>
                        <th scope="col">Nombre tarea</th>
                        <th scope="col">Fecha de inicio</th>
                        <th scope="col">Fecha de fin</th>
                        <th scope="col">Hora inicio</th>
                        <th scope="col">Hora de termino</th>
                        <th scope="col">Comentarios</th>
                        <th scope="col">Status de tarea</th>
                        <th scope="col">Editar tarea</th>
                        <th scope="col">Eliminar tarea</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($ver = mysqli_fetch_array($result)) {

                    ?>
                        <tr>
                            <th scope="row"><?php echo $ver['nombre_tarea'] ?></th>
                            <th scope="row"><?php echo give_format_date($ver['fecha_inicio'])?></th>
                            <th scope="row"><?php echo give_format_date($ver['fecha_fin']) ?></th>
                            <th scope="row"><?php echo $ver['hora_asignacion'] ?></th>
                            <th scope="row"><?php echo $ver['hora_terminacion'] ?></th>
                            <th scope="row"><?php echo $ver['comentarios'] ?></th>
                            <th scope="row">
                                <?php
                                date_default_timezone_set("America/Mexico_City");
                                $today = date("d-m-Y");
                                
                                $date_end = give_format_date($ver['fecha_fin']);
                                $today_format = strtotime($today);
                                $date_end_format = strtotime($date_end);

                                $hora = strtotime(date("H:m:s"));
                                $hora_final = strtotime($ver['hora_terminacion']);
                                
                                $respuesta = "";
                                    if($ver['status'] == 1){
                                        echo "<img src='../icons/correct.png' width='40px' height='40px'>";
                                    }else if($today_format <= $date_end_format){
                                        if($hora < $hora_final){
                                        
                                        $status = 2;
                                        $id = $ver['id_tarea'];
                                        $respuesta = $Usuario->status_wait($id, $status);
                                            if($respuesta){
                                                echo "<img src='../icons/wait.png' width='40px' height='40px'>";
                                            }
                                        }else if($hora >= $hora_final){
                                            
                                        $status = 3;
                                        $id = $ver['id_tarea'];
                                        $respuesta = $Usuario->status_error($id, $status);
                                        if($respuesta){
                                            echo "<img src='../icons/error.png' width='40px' height='40px'>";
                                        }
                                        }    
                                    }else if($today_format >= $date_end_format){
                                        

                                        $status = 3;
                                        $id = $ver['id_tarea'];
                                        
                                        if($Usuario->status_error($id, $status)){
                                            echo "<img src='../icons/error.png' width='40px' height='40px'>";
                                            
                                        }
                                    }
                                ?>
                            </th>
                            <?php
                                if($ver['status']== 1 or $ver['status']==3)
                                {

                            ?>
                            <th scope="row"><a href="./vista_actualizar_tarea.php?id_tarea=<?php echo $ver['id_tarea']?>"><i class="fs-2 fas fa-edit btn btn-warning" hidden></i></a></th>
                            <?php
                                }else{
                            ?> 
                            <th scope="row"><a href="./vista_actualizar_tarea.php?id_tarea=<?php echo $ver['id_tarea']?>"><i class="fs-2 fas fa-edit btn btn-warning"></i></a></th>
                            <?php       
                                }
                            ?>

                            <th scope="row"><a href="../procesos/usuarios/eliminar_tareas.php?id_tarea=<?php echo $ver['id_tarea']?>"><i class="fs-2 fas fa-trash-alt btn btn-danger"></i></a></th>

                            <?php
                                if($ver['status']== 1 or $ver['status']==3)
                                {

                            ?>
                            <th scope="row"><a href="../clases/Status.php?s_id=<?php echo $ver['id_tarea'] ?>" class="btn btn-success" hidden>Finalizar tarea</a></th>
                            <?php
                                }else{
                            ?>
                            <th scope="row"><a href="../clases/Status.php?s_id=<?php echo $ver['id_tarea'] ?>" class="btn btn-success">Finalizar tarea</a></th>
                            <?php        
                                }
                            ?> 
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
        
        <?php
        if (isset($_SESSION['insertado_tarea']) == 1) {
            echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'God job!',
              text: 'Operación exitosa, tarea guardada.',  
              })
             
    </script>";
    unset($_SESSION['insertado_tarea']);
            //session_destroy();
        } else if (isset($_SESSION['insertado_tarea']) == 2) {
            echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Oops...!',
              text: 'Operación fallida, no se guardo la tarea.',  
              })
             
    </script>";
    unset($_SESSION['insertado_tarea']);
            //session_destroy();
        }else if(isset($_SESSION['borrar_tarea']) == 3){
            echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'God job!',
              text: 'Operación exitosa, tarea borrada.',  
              })
             
    </script>";
    unset($_SESSION['borrar_tarea']);
        }else if(isset($_SESSION['borrar_tarea']) == 4){
            echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Oops...!',
              text: 'Operación fallida, no se borro la tarea.',  
              })
             
    </script>";
    unset($_SESSION['borrar_tarea']);
        }else if($_SESSION['actualizar_tarea'] == 5){
            echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'God job!',
              text: 'Operación exitosa, tarea actualizada.',  
              })
             
    </script>";
    unset($_SESSION['actualizar_tarea']);

        }else if($_SESSION['actualizar_tarea'] == 6){
            echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Oops...!',
              text: 'Operación fallida, no se actualizó la tarea.',  
              })
             
    </script>";
    unset($_SESSION['actualizar_tarea']);
        }

        ?>
    </body>

    </html>
<?php
} else {
    header("location:../index.php");
}
?>