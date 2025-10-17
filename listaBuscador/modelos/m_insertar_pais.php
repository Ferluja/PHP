<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Insertar pais</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../mostrar_paises/tabla_continentes_paises.php">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./m_insertar_pais.php">Nuevo pais</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <form action="../procesos/insertar_pais.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label for="">Continente</label>
                    <select name="listaPaises" id="listaPaises" class="form-select mt-2">
                        <option value="1">Africa</option>
                        <option value="2">America</option>
                        <option value="3">Asia</option>
                        <option value="4">Europa</option>
                        <option value="5">Oceania</option>
                    </select>

                        <br>
                        <label for="">Nombre del pais</label>
                        <br>
                        <input type="text" class="form-control" name="txt_nombrePais" placeholder="Nombre del pais" aria-label="Username" aria-describedby="addon-wrapping">
                        <br>
                        <label for="">Url imagen de pais</label>
                        <br>
                        <input type="text" class="form-control" name="txt_urlImagen" placeholder="Url imagen de pais" aria-describedby="addon-wrapping">
                    
                    <button class="btn btn-primary mt-3">Guardar</button>

                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>