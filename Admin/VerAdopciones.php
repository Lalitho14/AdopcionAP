<?php
function GenerarXML($sql, $link) {  
  // session_start();
  // if (isset($_SESSION['k_username']) & $_SESSION['k_tipo'] == 0);
  // else header("Location: ../index.php");
  
  $imp = new DOMImplementation();
  $dtd = $imp->createDocumentType('Adopciones', '', './adopciones.dtd');
  
  $dom = $imp->createDocument("", "", $dtd);
  $dom->encoding = 'UTF-8';
  $dom->formatOutput = true;
  
  $dom->appendChild($dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="./Veterinaria.xsl"'));
  
  $root = $dom->createElement('Adopciones');
  $dom->appendChild($root);
  
  // $sql = "SELECT * FROM Adopcion INNER JOIN Mascota ON Adopcion.id_Mascota=Mascota.id_Mascota INNER JOIN Duenio ON Adopcion.id_Duenio=Duenio.id_Duenio";
  $consulta = mysqli_query($link, $sql);
  
  while ($res = mysqli_fetch_array($consulta)) {
    $adopcion = $dom->createElement('Adopcion');
    $adopcion->appendChild($dom->createElement('id', $res['id_Adopcion']));
    $adopcion->appendChild($dom->createElement('fecha', htmlspecialchars($res['fecha'])));
  
    $mascota = $dom->createElement('mascota');
    $mascota->appendChild($dom->createElement('id_Mascota', $res['id_Mascota']));
    $mascota->appendChild($dom->createElement('nombre', htmlspecialchars($res[5])));
    $mascota->appendChild($dom->createElement('tipo', htmlspecialchars($res[6])));
    $mascota->appendChild($dom->createElement('descripcion', htmlspecialchars($res[7])));
    $mascota->appendChild($dom->createElement('adoptado', htmlspecialchars($res[8])));
    $mascota->appendChild($dom->createElement('imagen', htmlspecialchars($res[9])));
    $adopcion->appendChild($mascota);
  
    $duenio = $dom->createElement('duenio');
    $duenio->appendChild($dom->createElement('id_Duenio', $res['id_Duenio']));
    $duenio->appendChild($dom->createElement('nombre', htmlspecialchars($res[11])));
    $duenio->appendChild($dom->createElement('username', htmlspecialchars($res[12])));
    $duenio->appendChild($dom->createElement('tipo', htmlspecialchars($res[14])));
    $adopcion->appendChild($duenio);
  
    $root->appendChild($adopcion);
  }
  
  // mysqli_close($link);
  $dom->save("adopciones.xml");
}


// header("Location: ./adopciones.xml");
