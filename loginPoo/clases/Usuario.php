<?php
    
    class Usuario{
        public function logear($user, $password){
            try{
                $con = new Conexion();
                $conexion = $con->conectar();

                $sql = "SELECT * FROM t_usuarios 
                WHERE usuario = '$user' 
                AND password = '$password'";
                $respuesta = mysqli_query($conexion,$sql);

                //debemos preguntar cuantos registros existen 
                $existe = mysqli_num_rows($respuesta);
                if($existe > 0){
                    $_SESSION['usuario'] = $user;
                    return true;
                }else{
                    return false;
                }
            }catch(\Throwable $th){
                return $th->getMessage(); 

            }
        }
        public function insert_user($user, $password, $name, $plastname, $mlastname){
            $con = new Conexion();
            $conexion = $con->conectar();

            $sql = "INSERT INTO t_usuarios(usuario, password, nombre, apellido_paterno, apellido_materno) 
            VALUES('$user', '$password', '$name', '$plastname', '$mlastname')";
            $respuesta = mysqli_query($conexion, $sql);
            return $respuesta;
        }
        public function insert_homework($name_homework, $date_start, $date_end, $hour_start,$hour_end, $comments, $status){
            $con = new Conexion();
            $conexion = $con->conectar();

            $sql = "INSERT INTO t_tareas(nombre_tarea, fecha_inicio, fecha_fin, hora_asignacion, hora_terminacion, comentarios, status)
                    VALUES('$name_homework', '$date_start', '$date_end', '$hour_start', '$hour_end', '$comments', '$status')";
            $respuesta = mysqli_query($conexion, $sql);
            return $respuesta;
        }
        public function status_wait($id, $status){
            $con = new Conexion();
            $conexion = $con->conectar();
            $sql_wait = "UPDATE t_tareas SET status = '$status'
                        WHERE id_tarea = '$id'";
            $resultado = mysqli_query($conexion, $sql_wait);
            return $resultado;
            header("location:../vistas-panel/inicio.php");
        }
        public function status_error($id, $status){
            $con = new Conexion();
            $conexion = $con->conectar();
            $sql_error = "UPDATE t_tareas SET status = '$status'
                        WHERE id_tarea = '$id'";
            $resultado = mysqli_query($conexion, $sql_error);
            return $resultado;
            header("location:../vistas-panel/inicio.php");
        }
    }

?>