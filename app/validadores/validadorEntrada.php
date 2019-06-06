<?php
/*Esta es la clase con la que podemos validar*/
include_once 'validador.php';

class ValidadorEntradas extends Validador{

  public function __construct($titulo_entrada, $url_entrada, $cuerpo_entrada, $conexion){
    $this -> titulo_entrada = "";
    $this -> url_entrada = "";
    $this -> cuerpo_entrada = "";

    $this -> error_titulo = $this -> validarTitulo($conexion, $titulo_entrada);
    $this -> error_url = $this -> validarUrl($url_entrada);
    $this -> error_cuerpo = $this -> validarCuerpoEntrada($cuerpo_entrada);

    $this -> avisoApertura = "<br><div class='alert alert-danger' role='alert'>";
    $this -> avisoCierre = "</div>";
  }

}

 ?>
