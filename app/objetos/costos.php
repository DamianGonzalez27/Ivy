<?php

class Costos{
private $id_costo;
private $nombre_costo;
private $costo;
private $id_producto;

public function __construct($id_costo, $nombre_costo, $costo, $id_producto){
  $this -> id_costo = $id_costo;
  $this -> nombre_costo = $nombre_costo;
  $this -> costo = $costo;
  $this -> id_producto = $id_producto;
}

#Getters
public function getIdCosto(){
  return $this -> id_costo;
}
public function getNombreCosto(){
  return $this -> nombre_costo;
}
public function getCosto(){
  return $this -> costo;
}
public function getIdProducto(){
  return $this -> id_producto;
}

#Setters
public function setIdCosto($id_costo){
  $this -> id_costo = $id_costo;
}
public function setNombrecosto($nombre_costo){
  $this -> nombre_costo = $nombre_costo;
}
public function setcosto($costo){
  $this -> costo = $costo;
}
public function setIdProducto($id_producto){
  $this -> id_producto = $id_producto;
}
}

 ?>
