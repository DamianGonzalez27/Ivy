<?php
include_once 'app/validadores/validador.php';

class ValidarDomicilio extends Validador{

  public function __construct($nombre){
      $this -> nombre = $nombre;
      $this -> error_nombre = $this -> validarNombre($nombre);

      $this -> avisoApertura = "<br><div class='alert alert-danger' role='alert'>";
      $this -> avisoCierre = "</div>";
  }
}
 ?>
