
<?php
include "../clases/Conexion.php";

$id_continente = $_GET['id_con'];
            $c = new Conexion();
            $conexion = $c->conectar();
            $sql = "SELECT * FROM v_continentesPaises WHERE idContinente = '$id_continente'";
            $respuesta = mysqli_query($conexion, $sql);
            $datos = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
            




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.2/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="../font/all.min.css">
    

    <title>Paises</title>
</head>

<body>

    <a href="../mostrar_paises/tabla_continentes_paises.php" class="btn btn-danger position-absolute top-0 end-0">Salir</a>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <table id="example" class="table table-striped table-bordered nowrap mt-4" style="width:100%">
                    <thead>
                        <th hidden>Id continente</th>
                        <th>Nombre del continente</th>
                        <th hidden>Id pais</th>
                        <th>Nombre del pais</th>
                        <th>Bandera del pais</th>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $item) : ?>
                            <tr>
                                <td hidden><?php echo $item['idContinente']; ?></td>
                                <td><?php echo $item['nombreContinente']; ?></td>
                                <td hidden><?php echo $item['idPais']; ?></td>
                                <td><?php echo $item['nombrePais']; ?></td>
                                <td>
                                    <img src="<?php echo $item['rutaBandera']; ?>" width="150px" height="150px">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="./app.js"></script>
    <script src="../font/all.min.js"></script>

</body>

</html>