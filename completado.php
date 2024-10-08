<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>Adopcion</title>
</head>

<body>

  <main class="container">
    <div class="principal">
      <?php
      include("./templates/menu.php");
      require_once("./models/Duenio.php");
      require_once("./models/Mascota.php");
      require_once("./models/Adopcion.php");
      if (isset($_POST['nombre'])) {
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "Veterinaria");
        $nombre = $_POST['nombre'];
        $p = new Duenio($nombre);
        mysqli_query($link, "insert into Duenio(nombre) values('". $p->GetNombre() ."')");
        
        $consulta = mysqli_query($link, "select id_Duenio from Duenio order by id_Duenio desc limit 1");

        $res = mysqli_fetch_assoc($consulta);

        $id_mascota = $_GET['id_mascota'];
        $adop = new Adopcion($id_mascota, $res['id_Duenio']);

        mysqli_query($link, "insert into Adopcion(id_Mascota, id_Duenio) values(".$adop->GetIdMascota().", ".$res['id_Duenio'].")");

        mysqli_query($link,"UPDATE Mascota SET adoptado=1 WHERE id_Mascota=".$id_mascota."");

        mysqli_close($link);
      ?>
        <div class="row fadeInDown mensaje align-items-center m-5">
          <div class="col">
            <h1>Adopcion Completada</h1>
            <div class="text-center">
              <a href="./index.php" class="btn btn-success">Ok</a>
            </div>
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