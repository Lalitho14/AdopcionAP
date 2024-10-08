<?php

class Duenio
{
  private $id, $nombre;

  public function __construct($nombre)
  {
    $this->nombre = $nombre;
  }

  public function GetId()
  {
    return $this->id;
  }

  public function GetNombre()
  {
    return $this->nombre;
  }

  public function SetId($id)
  {
    $this->$id = $id;
  }
}
