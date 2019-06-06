<?php
class Compras{
private $id_compra;
private $id_usuario;
private $id_producto;
private $fecha_compra;
private $cantidad_compra;
private $entrega;
private $estatus_compra;
private $id_domicilio;

  public function __construct($id_compra, $id_usuario, $fecha_compra, $id_producto, $entrega, $estatus_compra, $cantidad_compra, $id_domicilio){
    $this -> id_compra = $id_compra;
    $this -> id_usuario = $id_usuario;
    $this -> id_producto = $id_producto;
    $this -> fecha_compra = $fecha_compra;
    $this -> cantidad_compra = $cantidad_compra;
    $this -> entrega = $entrega;
    $this -> estatus_compra = $estatus_compra;
    $this -> id_domicilio = $id_domicilio;
  }

  #Getters
  public function getIdCompra(){
    return $this -> id_compra;
  }
  public function getIdUsuario(){
    return $this -> id_usuario;
  }
  public function getIdProducto(){
    return $this -> id_producto;
  }
  public function getFechaCompra(){
    return $this -> fecha_compra;
  }
  public function getCantidadCompra(){
    return $this -> cantidad_compra;
  }
  public function getEntrega(){
    return $this -> entrega;
  }
  public function getEstatusCompra(){
    return $this -> estatus_compra;
  }
  public function getIdDomicilio(){
    return $this -> id_domicilio;
  }

  #Setters
  public function setIdCompra($id_compra){
    $this -> id_compra = $id_compra;
  }
  public function setIdUsuario($id_usuario){
    $this -> id_usuario = $id_usuario;
  }
  public function setIdProducto($id_producto){
    $this -> id_producto = $id_producto;
  }
  public function setFechaCompra($fecha_compra){
    $this -> fecha_compra = $fecha_compra;
  }
  public function setCantidadCompra($cantidad_compra){
    $this -> cantidad_compra = $cantidad_compra;
  }
  public function setEntrega($entrega){
    $this -> entrega = $entrega;
  }
  public function setEstatusCompra($estatus_compra){
    $this -> estatus_compra = $estatus_compra;
  }
  public function setIdDomicilio($id_domicilio){
    $this -> id_domicilio = $id_domicilio;
  }
}

 ?>
