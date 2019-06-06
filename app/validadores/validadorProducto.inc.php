<?php
include_once 'validador.php';

class ValidadorProducto extends Validador{

public function __construct($nombre, $descripcion, $precio, $keyword, $url){
  $this -> nombre = "";
  $this -> descripcion = "";
  $this -> precio = "";
  $this -> keyword = "";


  $this -> error_nombre = $this -> validarNombre($nombre);
  $this -> error_descripcion = $this -> vlidarDescripcion($descripcion);
  $this -> error_precio = $this -> validarPrecio($precio);
  $this -> error_keyword = $this -> validarKeyword($keyword);
  $this -> error_url = $this -> validarUrl($url);


  $this -> avisoApertura = "<br><div class='alert alert-danger' role='alert'>";
  $this -> avisoCierre = "</div>";
}










}
 ?>
