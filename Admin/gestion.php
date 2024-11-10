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
      $link = mysqli_connect("localhost", "root", "");
      mysqli_select_db($link, "Veterinaria");
      ?>
      <h1 class="m-3">Padrinos</h1>

      <div class="container text-center mt-3 mb-3">
        <div class="row">
          <form action="./gestion.php" method="post">
            <div class="row mb-3">
              <div class="col">
                <label for="duenio" class="mb-3">Selecciona usuario</label>
                <select name="duenio" class="form-select">
                  <?php
                  $consulta = mysqli_query($link, "SELECT * FROM Duenio");
                  while ($res = mysqli_fetch_array($consulta)) {
                    echo '<option value="' . $res['id_Duenio'] . '">' . $res['nombre'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <button class="btn btn-success">Mostrar Adopciones</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <?php
      if (isset($_POST['duenio'])) {
        $m = mysqli_query($link, "select * from Adopcion where id_Duenio = " . $_POST['duenio']);
        if (mysqli_num_rows($m) > 0) {
          while ($res = mysqli_fetch_array($m)) {
            $consulta_mascota = mysqli_query($link, "SELECT * FROM Mascota WHERE id_Mascota = " . $res['id_Mascota']);
            $mascota = mysqli_fetch_assoc($consulta_mascota);
            $consulta_duenio = mysqli_query($link, "SELECT nombre FROM Duenio WHERE id_Duenio = " . $res['id_Duenio']);
            $nombre_duenio = mysqli_fetch_assoc($consulta_duenio);
      ?>
            <div class="container text-center">
              <div class="row align-items-center m-3 p-3">
                <div class="col-3">
                  <div class="row">
                    <?php echo '<img src="../img/' . $mascota['imagen'] . '" alt="' . $mascota['nombre'] . '">'; ?>
                  </div>
                  <div class="row">
                    <?php echo '<h2>' . $mascota['nombre'] . '</h2>'; ?>
                  </div>
                </div>
                <div class="col">
                  <?php
                  echo '<h3>Fue adoptado por ' . $nombre_duenio['nombre'] . '</h3>';
                  echo '<p>' . $res['fecha'] . '</p>';
                  ?>
                </div>
              </div>
            </div>
          <?php
          }
        } else {
          ?>
          <div class="container text-center">
            <div class="row mb-3">
              <div class="alert alert-danger" role="alert">
                No ha realizado ninguna adopcion.
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
    <?php mysqli_close($link); ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>