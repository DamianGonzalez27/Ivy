<?php
include_once 'validador.php';

class ValidadorPromociones extends Validador{



public function __construct($nombre, $descripcion, $porcentaje_promocion, $id_producto){
  $this -> nombre = "";
  $this -> descripcion = "";
  $this -> porcentaje_promocion = "";
  $this -> id_producto = "";

  $this -> error_nombre = $this -> validarNombre($nombre);
  $this -> error_descripcion = $this -> vlidarDescripcion($descripcion);
  $this -> error_porcentaje = $this -> validarProcentajePromocion($porcentaje_promocion);
  $this -> error_id = $this -> validarIdProducto($id_producto);

  $this -> avisoApertura = "<br><div class='alert alert-danger' role='alert'>";
  $this -> avisoCierre = "</div>";
}
}
 ?>
