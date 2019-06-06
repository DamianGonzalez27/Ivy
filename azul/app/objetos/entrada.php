<?php
/*Cremos una clase para manejar los datos de las entradas*/
class Entrada{
  private $id_entrada;
  private $titulo_entrada;
  private $url_entrada;
  private $cuerpo_entrada;
  private $fecha_entrada;
  private $id_usuario;

  public function __construct($id_entrada, $id_usuario, $titulo_entrada, $url_entrada, $cuerpo_entrada,
                              $fecha_entrada){
      $this -> id_entrada = $id_entrada;
      $this -> titulo_entrada = $titulo_entrada;
      $this -> url_entrada = $url_entrada;
      $this -> cuerpo_entrada = $cuerpo_entrada;
      $this -> fecha_entrada = $fecha_entrada;
      $this -> id_usuario = $id_usuario;

                              }
  #getters
  public function getIdEntrada(){
    return $this -> id_entrada;
  }
  public function getTituloEntrada(){
    return $this -> titulo_entrada;
  }
  public function getUrlEntrada(){
    return $this -> url_entrada;
  }
  public function getCuerpoEntrada(){
    return $this -> cuerpo_entrada;
  }
  public function getFechaEntrada(){
    return $this -> fecha_entrada;
  }
  public function getIdUsuario(){
    return $this -> id_usuario;
  }

  #Setters
  public function setIdEntrada($id_entrada){
    $this -> id_entrada = $id_entrada;
  }
  public function setTituloEntrada($titulo_entrada){
    $this -> titulo_entrada = $titulo_entrada;
  }
  public function setUrlEntrada($url_entrada){
    $this -> url_entrada = $url_entrada;
  }
  public function setCuerpoEntrada($cuerpo_entrada){
    $this -> cuerpo_entrada = $cuerpo_entrada;
  }
  public function setFechaEntrada($fecha_entrada){
    $this -> fecha_entrada = $fecha_entrada;
  }
  public function setIdUsuarioEntrada($id_usuario){
    $this -> id_usuario = $id_usuario;
  }
}
 ?>
