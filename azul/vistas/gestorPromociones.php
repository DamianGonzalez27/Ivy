<?php
$titulo = 'Gestor Promociones';
$descipcion = 'Tienda virtual de Azul Diagnostic';
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'plantillas/gestores/gestorPromociones/gestor.inc.php';
include_once 'app/escritores/escritosHelper.inc.php';

switch ($gestor_actual) {
  case 'nueva-promo':
    include_once 'plantillas/gestores/gestorPromociones/crearPromocion.inc.php';
    break;
  case 'asignar-promo':
  include_once 'plantillas/gestores/gestorPromociones/asignar.php';
    break;
  case 'eliminar-promo-prod':
  include_once 'plantillas/gestores/gestorPromociones/eliminarPromoProd.php';
    break;
  case 'eliminar-promo':
  include_once 'plantillas/gestores/gestorPromociones/eliminarPromo.php';
    break;

  default:
    include_once 'plantillas/gestores/gestorPromociones/principal.inc.php';
    break;
}



include_once 'plantillas/gestores/gestorPromociones/gestorCierre.inc.php';
 ?>




<?php
include_once 'plantillas/cierre.inc.php';
 ?>
