<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>Veterinaria</title>
</head>

<body>
  <main class="container">
    <div class="principal">
      <?php include("./templates/menu.php") ?>
      <h1 class="m-4">Registro</h1>
      <hr>
      <div class="container">
        <form action="./registrarCliente.php" method="post" class="row justify-content-center">
          <div class="col-6">
            <div class="form-group input-group mb-3 mt-3">
              <span class="input-group-text">
                <i class="bi bi-person-vcard-fill"></i>
              </span>
              <input type="text" class="form-control" placeholder="Ingrese su nombre completo" name="nombre">
            </div>
            <div class="form-group input-group mb-3">
              <span class="input-group-text">
                <i class="bi bi-file-person-fill"></i>
              </span>
              <input type="text" class="form-control" placeholder="Ingrese un nombre de usuario" name="usuario">
            </div>
            <div class="form-group input-group mb-3">
              <span class="input-group-text">
                <i class="bi bi-envelope-fill"></i>
              </span>
              <input type="email" class="form-control" placeholder="abcde@correo.com" name="email">
            </div>
            <div class="form-gruop input-group mb-3">
              <span class="input-group-text">
                <i class="bi bi-lock-fill"></i>
              </span>
              <input type="password" class="form-control" placeholder="Minimo 8 caracteres" name="password">
            </div>
            <div class="row mb-3">
              <div class="col">
                <button type="submit" class="btn btn-success" name="registrar" id="botonC">Registrar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>