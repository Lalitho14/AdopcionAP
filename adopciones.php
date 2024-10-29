<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>Adopciones</title>
</head>

<body>
  <main class="container">
    <div class="principal">
      <?php
      include("./templates/menu.php");
      $link = mysqli_connect("localhost", "root", "");
      mysqli_select_db($link, "Veterinaria");
      ?>
      <h1 class="m-3">Realizar Adopciones</h1>
      <?php
      if (isset($_POST['duenio']) && isset($_POST['mascota'])) {
      ?>
        <div class="container text-center">
          <div class="row">
            <div class="alert alert-primary" role="alert">
              Adopcion realizada con exito.
            </div>
          </div>
        </div>
      <?php
        mysqli_query($link, 'INSERT INTO Adopcion(id_Mascota,id_Duenio) VALUES(' . $_POST['mascota'] . ', ' . $_POST['duenio'] . ')');
      }
      ?>
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <a class="btn btn-danger" href="./index.php">Regresar</a>
          </div>
        </div>
      </div>
    </div>
    <?php mysqli_close($link); ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>