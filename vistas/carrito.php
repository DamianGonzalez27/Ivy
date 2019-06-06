<?php
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoCarrito.php';
include_once 'app/redireccion.inc.php';
include_once 'app/escritores/escritosHelper.inc.php';

Conexion::abrirConexion();
if (isset($_POST['comprar'])) {
Redireccion::redirigir(RUTA_COMPRA);
}
if (isset($_POST['eliminar'])) {
  $id_usuario = $_SESSION['id_usuario'];
  $id_producto = $_POST['producto'];
  $producto_eliminado = RepoCarrito::eliminarProductosCarrito(Conexion::getConexion(), $id_usuario, $id_producto);
  if ($producto_eliminado) {
    Redireccion::redirigir(RUTA_CARRITO);
  }
}
if (isset($_POST['eliminar_evento'])) {
$id_usuario = $_SESSION['id_usuario'];
$id_evento = $_POST['id_evento'];
$evento_eliminado = RepoCarrito::eliminarEventosCarrito(Conexion::getConexion(), $id_usuario, $id_evento);
if ($evento_eliminado) {
  redireccion::redirigir(RUTA_CARRITO);
}
}
Conexion::cerrarConexion();
 ?>
<div class="jumbotron">
  <h1 class="text-center">Revisa tus compras</h1>
</div>
<div class="separador">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title text-center">Mis productos en carrito</h1>
    </div>
    <div class="panel-body">
  <?php
if (empty($productos) && empty($eventos)) {
  ?>
<div class="row">
  <div class="col-md-12">
    <h1 class="text-center">Aun no hay productos en tu carrito de compras</h1>
  </div>
</div>
  <?php
}else {
  ?>
  <div class="row">
    <div class="col-md-8">
        <table class="table table-responsive">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Descripcion</th>
              <th>Precio</th>
            </tr>
          </thead>
          <tbody>
            <?php Helper::insertarProductosCarrito($productos, $eventos);?>
          </tbody>
        </table>
    </div>
      <div class="col-md-4">
        <div class="panel-total">
          <h1>Total de pedido</h1>
           <hr class="featurette-divider">
           <table class="table table-responsive">
             <thead>
               <tr>
                 <th>Producto</th>
                 <th>Cantidad</th>
                 <th>Sub-total</th>
               </tr>
             </thead>
            <tbody>
           <?php Helper::insertarPanelCarrito($productos, $eventos);?>
        </div>
      </div>
  </div>
<?php
}
   ?>
    </div>
    <div class="panel-footer">
      <p class="text-center">Los costos de envio varian de acuerdo al domicilio de envio, y la cantidad de productos comprados</p>
    </div>
  </div>
</div>
<?php
include_once 'plantillas/cierre.inc.php';
 ?>
