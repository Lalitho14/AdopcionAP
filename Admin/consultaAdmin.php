<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <title>Veterinaria</title>
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['k_username']) & $_SESSION['k_tipo'] == 0);
  else header("Location: ../index.php");
  ?>
  <main class="container">
    <div class="principal">
      <?php include("../templates/menuAdmin.php"); ?>
      <h1 class="m-3">Nuestras mascotas</h1>
      <hr>
      <div class="container text-center">
        <?php
        require_once("../models/Mascota.php");
        $mascotas = [];

        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "Veterinaria");
        $consulta = mysqli_query($link, "select * from Mascota");
        while ($res = mysqli_fetch_array($consulta)) {
          $mascotas[] = new Mascota($res['id_Mascota'], $res['nombre'], $res['tipo'], $res['descripcion'], $res['adoptado'], $res['imagen']);
        }
        foreach ($mascotas as $mascota) {
          if (!$mascota->GetAdoptado()) {
        ?>
            <div class="row align-items-center m-3 column-gap-5">
              <div class="col-3">
                <div class="row">
                  <img src="../img/<?php echo $mascota->GetRutaImagen() ?>" alt="<?php echo $mascota->GetRutaImagen() ?>">
                </div>
                <div class="row">
                  <h2><?php echo $mascota->GetNombre(); ?></h2>
                </div>
              </div>
              <div class="col">
                <div class="row">
                  <p class="text-start"><?php echo $mascota->GetDescripcion() ?></p>
                </div>
                <div class="row">
                  <h3><?php echo $mascota->GetTipo() ?></h3>
                </div>
              </div>
              <div class="col">
                <div class="row justify-content-center">
                  <div class="col">
                    <a href="./VerMas.php?id_mascota=<?php echo $mascota->GetId() ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> Editar</a>
                  </div>
                  <div class="col">
                    <form action="./eliminar.php" method="post">
                      <input type="text" name="id_mascota" hidden value="<?php echo $mascota->GetId() ?>">
                      <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Eliminar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        }
        mysqli_close($link);
        ?>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>