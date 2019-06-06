<?php

class Promociones{
  private $id_promocion;
  private $nombre_promocion;
  private $porcentaje_promocion;

  public function __construct($id_promocion, $nombre_promocion, $porcentaje_promocion){
$this -> id_promocion = $id_promocion;
$this -> nombre_promocion = $nombre_promocion;
$this -> porcentaje_promocion = $porcentaje_promocion;

  }

  #Getters
  public function getIdPromocion(){
    return $this -> id_promocion;
  }
  public function getNombrePromocion(){
    return $this -> nombre_promocion;
  }
  public function getPorcentajePromocion(){
    return $this -> porcentaje_promocion;
  }


  #Setters
  public function setIdPromocion($id_promocion){
    $this -> id_promocion = $id_promocion;
  }
  public function setNombrePromocion($nombre_promocion){
    $this -> nombre_promocion = $nombre_promocion;
  }
  public function setPorcentajePromocion($porcentaje_promocion){
    $this -> porcentaje_promocion = $porcentaje_promocion;
  }

}

 ?>
