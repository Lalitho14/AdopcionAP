<?php
session_start();
if (isset($_SESSION['k_username']) & $_SESSION['k_tipo'] == 0);
else header("Location: ../index.php");

$id_mascota = $_POST['id_mascota'];

$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "Veterinaria");
$consulta = mysqli_query($link, "DELETE FROM Mascota WHERE id_Mascota = ".$id_mascota."");

mysqli_close($link);

header("Location: ./consultaAdmin.php");