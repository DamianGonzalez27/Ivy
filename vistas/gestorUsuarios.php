<?php
$titulo = 'Gestor Usuarios';
$descipcion = 'Panel de control de los productos';
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'plantillas/gestores/gestorUsuarios/gestor.inc.php';

switch ($gestor_actual) {
  case 'nuevo':
    include_once 'plantillas/gestores/gestorUsuarios/nuevo.inc.php';
    break;

  default:
    include_once 'plantillas/gestores/gestorUsuarios/principal.inc.php';
    break;
}

include_once 'plantillas/gestores/gestorProductos/gestorCierre.inc.php';
 ?>




<?php
include_once 'plantillas/cierre.inc.php';
 ?>
