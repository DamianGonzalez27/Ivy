<?php
class Municipio{
  private $id_municipio;
  private $estado_id_estado;
  private $nombre_municipio;

  public function __construct($id_municipio, $estado_id_estado, $nombre_municipio){
    $this -> id_municipio = $id_municipio;
    $this -> estado_id_estado = $estado_id_estado;
    $this -> nombre_municipio = $nombre_municipio;
  }

  #Getters
  public function getIdMunicipio(){
    return $this -> id_municipio;
  }
  public function getEstadoIdEstado(){
    return $this -> estado_id_estado;
  }
  public function getNombreMunicipio(){
    return $this -> nombre_municipio;
  }

  #Setters
  public function setIdMunicipio($id_municipio){
    $this -> id_municipio = $id_municipio;
  }
  public function setEstadoIdEstado($estado_id_estado){
    $this -> estado_id_estado = $estado_id_estado;
  }
  public function setNombreMunicipio($nombre_municipio){
    $this -> nombre_municipio = $nombre_municipio;
  }
}
 ?>
