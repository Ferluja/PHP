<?php 
    include "../clases/Conexion.php";
    $id_recibido = $_GET['id_tarea'];
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT * FROM t_tareas WHERE id_tarea = $id_recibido";
        $resultado = mysqli_query($conexion, $sql);
        $info = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="../css/style_index.css">
    <title>Document</title>
</head>

<body>
    <br>
    <div class="form-group">
        <a href="../procesos/usuarios/salir.php" type="submit" class="btn position-absolute top-0 end-0 login_btn">Log out</a>
    </div>
    <div class="form-group">
        <a href="../vistas-panel/inicio.php" type="submit" class="btn position-absolute top-0 start-0 login_btn">Home</a>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card" style="height: auto;">
                <div class="card-header">
                    <h3>Update homework</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <h2 style="color: white;">Hello <?php echo $_SESSION['usuario']; ?></h2>
                    </div>
                </div>
                <div class="card-body">
                    <form action="../procesos/usuarios/actualizar_tareas.php" method="post">
                    <div class="input-group form-group visually-hidden" >
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            </div>

                            <input type="text" name="input_id" value="<?php echo $info['id_tarea'] ?>" placeholder="id homework">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            </div>

                            <input type="text" name="input_namehomework" value="<?php echo $info['nombre_tarea'] ?>" placeholder="name homework" required="">
                        </div>
                        <br>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" name="input_date_start" value="<?php echo $info['fecha_inicio'] ?>">

                        </div>
                        <br>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" name="input_date_end" value="<?php echo $info['fecha_fin'] ?>">

                        </div>
                        <br>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="time" name="input_hour_start" value="<?php echo $info['hora_asignacion'] ?>">

                        </div>
                        <br>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="time" name="input_hour_end" value="<?php echo $info['hora_terminacion'] ?>">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-comment"></i></span>
                            </div>
                            <textarea class="form-control" name="input_comments" aria-label="With textarea" placeholder="comments"><?php echo $info['comentarios']?></textarea>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-5">
                                <button class="btn float-right login_btn container-fluid mt-5">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        <p style="color: white;">Note: Enter only the expiration date </p>

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>