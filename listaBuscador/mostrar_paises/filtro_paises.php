<?php
include "../header.php";
?>
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
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Lista buscador</h2>
            <form action="./tabla_paises.php" method="post">
                <select name="listaPaises" id="listaPaises" class="form-select">
                    <option value="1">Africa</option>
                    <option value="2">America</option>
                    <option value="3">Asia</option>
                    <option value="4">Europa</option>
                    <option value="5">Oceania</option>
                </select>
                <button class="btn btn-success mt-3">Ir</button>
            </form>
        </div>
    </div>
</div>

<?php
include "../footer.php";
?>
