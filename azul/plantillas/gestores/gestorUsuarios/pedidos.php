<?php
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/conexion.inc.php';
Conexion::abrirConexion();
include_once 'app/repos/repoCarrito.php';
include_once 'app/repos/repoDomicilio.php';
include_once 'app/repos/repoProductos.php';
include_once 'app/redireccion.inc.php';
include_once 'app/repos/repoCompras.php';
include_once 'app/objetos/compras.php';
include_once 'app/escritores/escritosHelper.inc.php';
include_once 'plantillas/modals/modalUsuario.inc.php';

$id_usuario = $_SESSION['id_usuario'];
 ?>
<div class="jumbotron">
  <h1 class="text-center">Revisa tus pedidos</h1>
</div>
<div class="row separador">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 class="panel-title text-center">Revisa tus pedidos</h1>
      </div>
      <div class="panel-body">
<table class="table table-responsive">
  <thead>
    <tr>
      <th>Folio de compra</th>
      <th>Estatus de pedido</th>
      <th colspan="2">Fecha de compra</th>
    </tr>
  </thead>
<tbody>
  <!--Seccion de codigo de productos-->
<?php Helper::getPedidosUser($pedidos);?>
<?php Helper::getEnviados($envios);?>
  <!--Seccion de codigo de productos-->
</tbody>
</table>
      </div>
    </div>
  </div>
</div>
  <?php
  Conexion::cerrarConexion();
 include_once 'plantillas/cierre.inc.php';
   ?>
