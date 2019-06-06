<?php

class Codigo{
  private $id_codigo;
  private $estado_id_estado;
  private $codigo_postal;

public function __construct($id_codigo, $estado_id_estado, $codigo_postal){
  $this -> id_codigo = $id_codigo;
  $this -> estado_id_estado = $estado_id_estado;
  $this -> codigo_postal = $codigo_postal;
}

#Getters
public function getIdCodigo(){
  return $this -> id_codigo;
}
public function getEstadoIdEstado(){
  return $this -> estado_id_estado;
}
public function getCodigoPostal(){
  return $this -> codigo_postal;
}

#Setters
public function setIdCodigo($id_codigo){
 $this -> id_codigo = $id_codigo;
}
public function setEstadoIdEstado($estado_id_estado){
 $this -> estado_id_estado = $estado_id_estado;
}
public function setCodigoPostal(){
 $this -> codigo_postal = $codigo_postal;
}
}
 ?>
