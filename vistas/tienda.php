<?php
$titulo = 'Tienda Azul';
$descipcion = 'Tienda virtual de Azul Diagnostic';
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'plantillas/gestores/gestorTienda/gestor.inc.php';

if (isset($_POST['buscar'])) {
  $gestor_actual = 'resultado-busqueda';
  $busqueda = $_POST['busqueda'];
}
if (isset($_POST['categoria'])) {
$gestor_actual = 'productos';
$busqueda = $_POST['id_categoria'];
}
switch ($gestor_actual) {
  case 'productos':
  $busqueda;
  include_once 'plantillas/gestores/gestorTienda/general.php';
    break;
  case 'resultado-busqueda':
  $busqueda;
  include_once 'plantillas/gestores/gestorTienda/resultadosBusqueda.inc.php';
    break;
  default:
    include_once 'plantillas/gestores/gestorTienda/principal.inc.php';
    break;
}



include_once 'plantillas/gestores/gestorTienda/gestorCierre.inc.php';
 ?>




<?php
include_once 'plantillas/cierre.inc.php';
 ?>
