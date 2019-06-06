<?php
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoCarrito.php';
include_once 'app/repos/repoDomicilio.php';
include_once 'app/repos/repoProductos.php';
include_once 'app/redireccion.inc.php';
include_once 'app/repos/repoCompras.php';
include_once 'app/objetos/compras.php';
Conexion::abrirConexion();
include_once 'plantillas/gestores/gestorMensajes/gestor.inc.php';

switch ($gestor_actual) {
  case 'bandeja-entrada':
  include_once 'plantillas/gestores/gestorMensajes/bandejaEntrada.php';
    break;

  default:
  include_once 'plantillas/gestores/gestorMensajes/bandejaEntrada.php';
    break;
}
 ?>
<?php
include_once 'plantillas/gestores/gestorMensajes/gestorCierre.inc.php';
Conexion::cerrarConexion();
include_once 'plantillas/cierre.inc.php';
 ?>
