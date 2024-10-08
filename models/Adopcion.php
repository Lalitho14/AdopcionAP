<?php

class Adopcion{
  private $id, $fecha, $id_Mascota, $id_Duenio;

  public function __construct($id_Mascota, $id_Duenio) {
    $this->id_Mascota = $id_Mascota;
    $this->id_Duenio = $id_Duenio;
  }

  public function GetId() {
    return $this->id;
  }

  public function GetFecha(){
    return $this->fecha;
  }

  public function GetIdMascota(){
    return $this->id_Mascota;
  }

  public function GetIdDuenio(){
    return $this->id_Duenio;
  }
}