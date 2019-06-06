<?php
$titulo = 'Gestor Productos';
$descipcion = 'Panel de control de los productos';
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'plantillas/gestores/gestorProductos/gestor.inc.php';
include_once 'app/objetos/productos.php';
include_once 'app/repos/repoProductos.php';
include_once 'app/repos/repoCompras.php';
include_once 'app/conexion.inc.php';
include_once 'app/escritores/escritosHelper.inc.php';

Conexion::abrirConexion();
switch ($gestor_actual) {
  case 'nuevo':
    include_once 'plantillas/gestores/gestorProductos/nuevo.inc.php';
    break;
  case 'borrar-producto':
    include_once 'plantillas/gestores/gestorProductos/eliminarProductosVacio.inc.php';
    break;
  case 'productos-vendidos':
    include_once 'plantillas/modals/modalVendidos.php';
    include_once 'plantillas/gestores/gestorProductos/vendidos.php';
    break;
  case 'productos-enviados':
    include_once 'plantillas/modals/modalUsuario.inc.php';
    include_once 'plantillas/gestores/gestorProductos/enviados.php';
    break;
  case 'facturas-pendientes':
    include_once 'plantillas/modals/modalFacturas.php';
    include_once 'plantillas/gestores/gestorProductos/facturas.php';
    break;
  case 'categorias':
    include_once 'plantillas/gestores/gestorProductos/categorias.php';
    break;
  case 'inventario':
    include_once 'plantillas/gestores/gestorProductos/inventario.php';
    break;
  case 'historico':
  include_once 'plantillas/modals/modalUsuario.inc.php';
    include_once 'plantillas/gestores/gestorProductos/historico.php';
    break;
  default:
    include_once 'plantillas/gestores/gestorProductos/principal.inc.php';
    break;
}
Conexion::cerrarConexion();
include_once 'plantillas/gestores/gestorProductos/gestorCierre.inc.php';
 ?>
<?php
include_once 'plantillas/cierre.inc.php';
 ?>
