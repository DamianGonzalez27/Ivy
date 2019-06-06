<?php

class Domicilio{
  private $id_domicilio;
  private $estado_id_estado;
  private $codigo_postal_id_codigo;
  private $municipio_id_municipio;
  private $colonia;
  private $no_interior;
  private $no_exterior;
  private $localidad;
  private $calle;
  private $referencias;
  private $usuario;

  public function __construct($id_domicilio, $estado_id_estado, $codigo_postal_id_codigo, $municipio_id_municipio, $colonia,
                              $no_interior, $no_exterior, $localidad, $calle, $referencias, $usuario){

$this -> id_domicilio = $id_domicilio;
$this -> estado_id_estado = $estado_id_estado;
$this -> codigo_postal_id_codigo = $codigo_postal_id_codigo;
$this -> municipio_id_municipio = $municipio_id_municipio;
$this -> colonia = $colonia;
$this -> no_interior = $no_interior;
$this -> no_exterior = $no_exterior;
$this -> localidad = $localidad;
$this -> calle = $calle;
$this -> referencias = $referencias;
$this -> usuario = $usuario;
                              }
#Getters
  public function getIdDomicilio(){
    return $this -> id_domicilio;
  }
  public function getEstadoIdEstado(){
    return $this -> estado_id_estado;
  }
  public function getCodigoPostal(){
    return $this -> codigo_postal_id_codigo;
  }
  public function getMunicipioIdMunicipio(){
    return $this -> municipio_id_municipio;
  }
  public function getColonia(){
    return $this -> colonia;
  }
  public function getNoInterior(){
    return $this -> no_interior;
  }
  public function getNoExterior(){
    return $this -> no_exterior;
  }
  public function getLocalidad(){
    return $this -> localidad;
  }
  public function getCalle(){
    return $this -> calle;
  }
  public function getReferencias(){
    return $this -> referencias;
  }
  public function getUsuario(){
    return $this -> usuario;
  }

  #Setters
  public function setIdDomicilio($id_domicilio){
    $this -> id_domicilio = $id_domicilio;
  }
  public function setEstadoIdEstado($estado_id_estado){
    $this -> estado_id_estado = $estado_id_estado;
  }
  public function setCodigoPostal($codigo_postal_id_codigo){
    $this -> codigo_postal_id_codigo = $codigo_postal_id_codigo;
  }
  public function setMunicipioIdMunicipio($municipio_id_municipio){
    $this -> municipio_id_municipio = $municipio_id_municipio;
  }
  public function setColonia($colonia){
    $this -> colonia = $colonia;
  }
  public function setNoInterior($no_interior){
    $this -> no_interior = $no_interior;
  }
  public function setNoExterior($no_exterior){
    $this -> no_exterior = $no_exterior;
  }
  public function setLocalidad($localidad){
    $this -> localidad = $localidad;
  }
  public function setCalle($calle){
    $this -> calle = $calle;
  }
  public function setReferencias($referencias){
    $this -> referencias = $referencias;
  }
  public function setUsuario($usuario){
    $this -> usuario = $usuario;
  }

}
 ?>
