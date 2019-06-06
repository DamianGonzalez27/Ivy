<?php

class Categorias{
  private $id_categoria;
  private $nombre_categoria;

  public function __construct($id_categoria, $nombre_categoria){
    $this -> id_categoria = $id_categoria;
    $this -> nombre_categoria = $nombre_categoria;
  }

#Getters
public function getIdCategoria(){
  return $this -> id_categoria;
}
public function getNombreCategoria(){
  return $this -> nombre_categoria;
}

#Setters
public function setIdCategoria($id_categoria){
  $this -> id_categoria = $id_categoria;
}
public function setNombreCategoria($nombre_categoria){
  $this -> nombre_categoria = $nombre_categoria;
}
}

 ?>
