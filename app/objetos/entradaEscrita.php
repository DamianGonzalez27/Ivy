<?php
class EntradaEscrita{
  private $id_entrada;
  private $usuario;
  private $titulo;
  private $url;
  private $cuerpo;
  private $fecha;
  private $nombre;
  private $apellido;

public function __construct($id_entrada, $usuario, $titulo, $url, $cuerpo, $fecha, $nombre, $apellido){
  $this -> id_entrada = $id_entrada;
  $this -> usuario = $usuario;
  $this -> titulo = $titulo;
  $this -> url = $url;
  $this -> cuerpo = $cuerpo;
  $this -> fecha = $fecha;
  $this -> nombre = $nombre;
  $this -> apellido = $apellido;
}

public function getIdEntrada(){
  return $this -> id_entrada;
}
public function getUsuario(){
  return $this -> usuario;
}
public function getTitulo(){
  return $this -> titulo;
}
public function getUrl(){
  return $this -> url;
}
public function getCuerpo(){
  return $this -> cuerpo;
}
public function getFecha(){
  return $this -> fecha;
}
public function getNombre(){
  return $this -> nombre;
}
public function getApellido(){
  return $this -> apellido;
}

}
 ?>
