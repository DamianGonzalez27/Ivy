<?php

class Evento{

private $id_evento;
private $nombre_evento;
private $precio_evento;
private $fecha_evento;
private $status_evento;

public function __construct($id_evento, $nombre_evento, $precio_evento, $fecha_evento, $status_evento){
  $this -> id_evento = $id_evento;
  $this -> nombre_evento = $nombre_evento;
  $this -> precio_evento = $precio_evento;
  $this -> fecha_evento = $fecha_evento;
  $this -> status_evento = $status_evento;
}

#getters
public function getIdEvento(){
  return $this -> id_evento;
}
public function getNombreEvento(){
  return $this -> nombre_evento;
}
public function getPrecioEvento(){
  return $this -> precio_evento;
}
public function getFechaEvento(){
  return $this -> fecha_evento;
}
public function getStatusEvento(){
  return $this -> status_evento;
}

#Setters
public function setIdEvento($id_evento){
  $this -> id_evento = $id_evento;
}
public function setNombreEvento($nombre_evento){
  $this -> nombre_evento = $nombre_producto;
}
public function setPrecioEvento($precio_evento){
  $this -> precio_evento = $precio_evento;
}
public function setFechaEvento($fecha_evento){
  $this -> fecha_evento = $fecha_evento;
}
}
 ?>
