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
include_once 'app/repos/repoFacturas.php';
include_once 'app/validadores/validadorFactura.php';

if (isset($_POST['facturar'])) {
$compra = $_POST['id_producto'];
$domicilio = $_POST['envios'];
$rfc = $_POST['rfc'];
$status = 4;
$validador = new ValidadorFactura($rfc);

if ($validador -> rfcValidado()) {
  $factura = RepoFacturas::solicitarFactura(Conexion::getConexion(), $compra, $rfc, $_SESSION['id_usuario'], $domicilio);
  if ($factura) {
  $pedido_solicitado = RepoCompra::enviarPedido(Conexion::getConexion(), $compra, $status);
    if ($pedido_solicitado) {
      Redireccion::redirigir(RUTA_FACTURACION);
    }
  }
}
}
Conexion::cerrarConexion();
 ?>
<div class="jumbotron">
  <h1 class="text-center">Revisa tus compras</h1>
</div>

<div class="row separador">
<div class="col-md-4">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Datos de facturacion</h3>
  </div>
  <div class="panel-body">
    <form role="form" action="<?php echo RUTA_FACTURACION;?>" method="post">
      <div class="form-group">
        <label>Selecciona un domicilio para facturacion</label>
          <?php Helper::iterarDomicilioOnSelect($domicilios);?>
      </div>
      <div class="form-group">
        <?php
        if (!isset($_POST['facturar'])) {
          ?>
          <div class="form-group">
            <label>Ingresa tu rfc</label>
            <input type="text" name="rfc">
          </div>
          <?php
        }else {
          ?>
        <div class="form-group">
          <label>Ingresa tu rfc</label>
          <input type="text" name="rfc" <?php echo $validador -> setErrorNombre();?>>
        </div>
          <?php
        }
         ?>
      </div>
  </div>
  <div class="panel-footer">
<p>Recuerda que los datos que ingreses para solicitar tu fatura deben ser fidedignos</p>
<p>Una vez que se realize la solicitud de factura un ejecutivo se pondra en contacto contigo para completar el proceso.</p>
<p>Para la solicitud de factura el campo de RFC no debe estar vacio</p>
  </div>
</div>
</div>
<div class="col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title text-center">Compras y facturacion</h1>
    </div>
    <div class="panel-body">
<table class="table table-responsive">
  <thead>
    <tr>
      <th>Folio de compra</th>
      <th>Fecha de compra</th>
      <th colspan="2">Factura</th>
    </tr>
  </thead>
  <tbody>
    <?php Helper::getProductosFactura($productos);?>
    <?php Helper::getPendientesFactura($productos_pendientes);?>
    <?php Helper::getFacturados($productos_facturados);?>
       </form>
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
