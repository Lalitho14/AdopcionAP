<?php

class Mascota
{
  private $id, $nombre, $tipo, $descripcion, $adoptado, $ruta_img;

  public function __construct($id, $nombre, $tipo, $descripcion, $adoptado, $ruta_img)
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->tipo = $tipo;
    $this->descripcion = $descripcion;
    $this->adoptado = $adoptado;
    $this->ruta_img = $ruta_img;
  }

  public function SetRutaImagen($ruta)
  {
    $this->ruta_img = $ruta;
  }

  public function GetId() {
    return $this->id;
  }

  public function GetNombre() {
    return $this->nombre;
  }

  public function GetTipo() {
    return $this->tipo;
  }

  public function GetDescripcion() {
    return $this->descripcion;
  }

  public function GetAdoptado() {
    return $this->adoptado;
  }

  public function GetRutaImagen(){
    return $this->ruta_img;
  }
}
