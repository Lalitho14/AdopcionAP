<!DOCTYPE html>
<html lang="en">

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
      <?php include("./templates/menu.php"); ?>
      <h1>Padrinos</h1>

      <?php
      require_once("./models/Mascota.php");
      require_once("./models/Duenio.php");
      $link = mysqli_connect("localhost", "root", "");
      mysqli_select_db($link, "Veterinaria");
      $m = mysqli_query($link, "select * from Mascota where adoptado=1");
      
      while ($res = mysqli_fetch_array($m)) {
        $mascota = new Mascota($res['id_Mascota'], $res['nombre'], $res['tipo'], $res['descripcion'], $res['adoptado'], $res['imagen']);
        $consulta = mysqli_query($link, "select * from Adopcion where id_Mascota=".$mascota->GetId()."");
        $r = mysqli_fetch_array($consulta);

        $consulta = mysqli_query($link, "select nombre from Duenio where id_Duenio=".$r['id_Duenio']."");
        $r = mysqli_fetch_array($consulta);
        
        $nombre = $r['nombre'];

      ?>
        <div class="row align-items-center m-3 p-3">
          <div class="col-3">
            <div class="row">
              <img src="./img/<?php echo $mascota->GetRutaImagen() ?>" alt="">
            </div>
            <div class="row">
              <h2><?php echo $mascota->GetNombre() ?></h2>
            </div>
          </div>
          <div class="col">
            <h3>Fue adoptado por <?php echo $nombre ?></h3>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>