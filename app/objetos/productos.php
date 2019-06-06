<?php

class Producto{
private $id_producto;
private $nombre_producto;
private $descripcion_producto;
private $precio_producto;
private $keyword_producto;
private $categoria_producto;
private $url_producto;
private $stock;
private $codigo_interno;


public function __construct($id_producto, $nombre_producto, $descripcion_producto, $precio_producto,
                            $keyword_producto, $categoria_producto, $url_producto, $stock, $codigo_interno){

  $this -> id_producto = $id_producto;
  $this -> nombre_producto = $nombre_producto;
  $this -> descripcion_producto = $descripcion_producto;
  $this -> precio_producto = $precio_producto;
  $this -> keyword_producto = $keyword_producto;
  $this -> categoria_producto = $categoria_producto;
  $this -> url_producto = $url_producto;
  $this -> stock = $stock;
  $this -> codigo_interno = $codigo_interno;

                            }

#getters
public function getIdPropducto(){
  return $this -> id_producto;
}
public function getNombreProducto(){
  return $this -> nombre_producto;
}
public function getDescripcionProducto(){
  return $this -> descripcion_producto;
}
public function getPrecioProducto(){
  return $this -> precio_producto;
}
public function getKeywordProducto(){
  return $this -> keyword_producto;
}
public function getCategoriaProducto(){
  return $this -> categoria_producto;
}
public function getUrlProducto(){
  return $this -> url_producto;
}
public function getStock(){
  return $this -> stock;
}
public function getCodigoInterno(){
  return $this -> codigo_interno;
}

#Setters
public function setIdProducto($id_producto){
  $this -> id_producto = $id_producto;
}
public function setNombreProducto($nombre_producto){
  $this -> nombre_producto = $nombre_producto;
}
public function setDescripcionProducto($descripcion_producto){
  $this -> descripcion_producto = $descripcion_producto;
}
public function setPrecioProducto($precio_producto){
  $this -> precio_producto = $precio_producto;
}
public function setKeywordProducto($keyword_producto){
  $this -> keyword_producto = $keyword_producto;
}
public function setCategoriaProducto($categoria_producto){
  $this -> categoria_producto = $categoria_producto;
}
public function setUrlProductos($url_producto){
  $this -> url_producto = $url_producto;
}
public function setStock($stock){
  $this -> stock = $stock;
}
public static function setCodigoInterno($codigo_interno){
  $this -> codigo_interno = $codigo_interno;
}


}


 ?>
