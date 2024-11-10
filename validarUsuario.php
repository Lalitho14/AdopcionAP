<?php

session_start();
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "Veterinaria");

$usu = $_REQUEST['usr'];
$pas = $_REQUEST['passwd'];

$result = mysqli_query($link, "SELECT id_Duenio, password, username, tipo FROM Duenio WHERE username='" . $usu . "'");

if ($row = mysqli_fetch_array($result)) {
  if ($row["password"] == $pas) {
    $_SESSION["k_username"] = $row['username'];
    $_SESSION["k_tipo"] = $row['tipo'];
    $_SESSION["k_id"] = $row['id_Duenio'];
    echo "<p>Has sido logueado correctamente: " . $_SESSION['k_username'] . "</p>";
    if ($row["tipo"] == 1) {
      header("Location: ./Client/index.php");
    } else {
      header("Location: ./Admin/index.php");
    }
  } else {
    print("Password incorrecto.");
    echo '<a href="./index.php">Regresar</a>';
    header("Location: ./acceso_errorPasswd.php");
  }
} else {
  print("Login incorrecto");
  echo '<a href="./index.php">Regresar</a>';
  header("Location: ./acceso_error.php");
}
