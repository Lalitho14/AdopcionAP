<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>Veterinaria</title>
</head>

<body>
  <main class="container">
    <div class="principal">
      <?php
      include("./templates/menu.php");
      require_once("./models/Mascota.php");
      $id = $_GET['id_mascota'];

      $link = mysqli_connect("localhost", "root", "");
      mysqli_select_db($link, "Veterinaria");
      $consulta = mysqli_query($link, "select * from Mascota where id_Mascota=" . $id . "");
      $res = mysqli_fetch_array($consulta);
      $mascota = new Mascota($res['id_Mascota'], $res['nombre'], $res['tipo'], $res['descripcion'], $res['adoptado'], $res['imagen']);
      ?>
      <h1 id="home">Adopta a <?php echo $mascota->GetNombre() ?></h1>
      <div class="container text-center">
        <div class="row align-items-center"">
          <div class=" col-5">
          <img src="./img/<?php echo $mascota->GetRutaImagen() ?>" alt="" width="300px">
        </div>
        <div class="col">
          <div class="row">
            <h3><?php echo $mascota->GetNombre() ?></h3>
          </div>
          <div class="row">
            <p class="text-start"><?php echo $mascota->GetDescripcion() ?></p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </main>

  <?php
  mysqli_close($link);
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>