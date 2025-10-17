
<?php
include "../clases/Conexion.php";
include "../clases/Crud.php";

$crud = new Crud();
$datos = $crud->listaContinentesPaisesTotales();

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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="./tabla_continentes_paises.php">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../modelos/m_insertar_pais.php">Nuevo pais</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./filtro_paises.php">Filtro de paises</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../mapa.php">Mapa de paises</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
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
                        <th>Editar</th>
                        <th>Eliminar</th>
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
                                <td align="center" style="vertical-align: middle;">
                                    <a href="../modelos/m_editar_pais.php?id_pais=<?php echo $item['idPais'];?>
                                    &id_continente=<?php echo $item['idContinente']; ?>" style="color: yellow;">
                                        <i class="fs-1 fas fa-edit"></i>
                                    </a>
                                </td>
                                <td align="center" style="vertical-align: middle;">
                                <a href="../modelos/m_eliminar_pais.php?id_pais=<?php echo $item['idPais'];?>
                                    &id_continente=<?php echo $item['idContinente']; ?>" style="color: red;">
                                        <i class="fs-1 fas fa-trash"></i>
                                    </a>
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