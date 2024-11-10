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
  if(isset($_SESSION['k_username']) & $_SESSION['k_tipo'] == 1);
  else header("Location: ../index.php");
  ?>
  <main class="container">
    <div class="principal">
      <?php include("../templates/menuCliente.php") ?>
      <h1 class="m-4">Bienvenido <?php echo $_SESSION['k_username'] ?> a Veterinaria S.A. de C.V.</h1>
      <hr>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-8 p-3 m-2">
            <div class="row text-start">
              <p>Ayudanos a encontrar hogar para estas dulces mascotas, con tu ayuda podemos mantener a estas criaturas sanas y salvas.</p>
              <p>Gracias por tu visita. Vuelva pronto.</p>
            </div>
          </div>
          <div class="col p-3 m-2">
            <div class="row">
              <h2>Tipos de Mascota</h2>
            </div>
            <div class="row p-2">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Perros</li>
                <li class="list-group-item">Gatos</li>
                <li class="list-group-item">Aves</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>