<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <?php
      include("../templates/menuAdmin.php");
      require_once("../models/Mascota.php");
      $link = mysqli_connect("localhost", "root", "");
      mysqli_select_db($link, "Veterinaria");
      $n_mascota = $_POST['nombre_mascota'];
      $d_mascota = $_POST['des_mascota'];
      $id_mascota = $_POST['id_mascota'];
      ?>
      <h1 class="m-3">Actualizar Mascota</h1>
      <?php
      mysqli_query($link, "UPDATE Mascota SET nombre ='".$n_mascota."', descripcion = '".$d_mascota."' WHERE id_Mascota = ".$id_mascota."");
      ?>
      <div class="container text-center">
        <div class="row">
          <div class="alert alert-primary" role="alert">
            Mascota actualizada con exito.
          </div>
        </div>
      </div>
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <a class="btn btn-danger" href="./index.php">Regresar</a>
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