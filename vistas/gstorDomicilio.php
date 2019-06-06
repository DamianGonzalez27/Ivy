<?php
$titulo = 'Gestor Domicilio';
$descipcion = 'Panel de control de los productos';
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'plantillas/gestores/gestorDomicilio/gestor.inc.php';
include_once 'app/objetos/productos.php';
include_once 'app/repos/repoProductos.php';
include_once 'app/repos/repoCompras.php';
include_once 'app/conexion.inc.php';
include_once 'app/escritores/escritosHelper.inc.php';

switch ($gestor_actual) {
  case 'estado':
include_once 'plantillas/gestores/gestorDomicilio/estado.php';
    break;
  case 'municipio':
include_once 'plantillas/gestores/gestorDomicilio/municipio.php';
    break;
  case 'codigo-postal':
include_once 'plantillas/gestores/gestorDomicilio/codigo-postal.php';
    break;

  default:
    include_once 'plantillas/gestores/gestorDomicilio/estado.php';
    break;
}

include_once 'plantillas/gestores/gestorDomicilio/cierre.inc.php';

include_once 'plantillas/cierre.inc.php';
 ?>
