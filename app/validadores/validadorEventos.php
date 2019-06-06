<?php
include_once 'validador.php';
class ValidadorEventos extends Validador{

public function __construct($nombre, $precio){
  $this -> nombre = "";
  $this -> precio = "";

  $this -> error_nombre = $this -> validarNombre($nombre);
  $this -> error_precio = $this -> validarPrecio($precio);

  $this -> avisoApertura = "<br><div class='alert alert-danger' role='alert'>";
  $this -> avisoCierre = "</div>";
}
}
 ?>
