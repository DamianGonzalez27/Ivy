<?php

class Carrito{

private $id_usuario;
private $producto;
private $cantidad;

public function __construct($id_usuario, $producto, $cantidad){

  $this -> id_usuario = $id_usuario;
  $this -> producto = $producto;
  $this -> cantidad = $cantidad;
}

#getters
public function getIdUsuario(){
  return $this -> id_usuario;
}
public function getProducto(){
  return $this -> producto;
}
public function getCantidad(){
  return $this -> cantidad;
}


#Setters
public function setIdUsuario($id_usuario){
  $this -> id_usuario = $id_usuario;
}
public function setProducto($producto){
  $this -> producto = $producto;
}
public function setCantidad($cantidad){
  $this -> cantidad = $cantidad;
}

}


 ?>
