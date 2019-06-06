<?php
class Estado{
  private $id_estado;
  private $nombre_estado;

  public function __construct($id_estado, $nombre_estado){
    $this -> id_estado = $id_estado;
    $this -> nombre_estado = $nombre_estado;
  }

  #Getters
  public function getIdEstado(){
    return $this -> id_estado;
  }
  public function getNombreEstado(){
    return $this -> nombre_estado;
  }

  #Setters
  public function setIdEstado($id_estado){
    $this -> id_estado = $id_estado;
  }
  public function setNombreEstado($nombre_estado){
    $this -> nombre_estado = $nombre_estado;
  }
}
 ?>
