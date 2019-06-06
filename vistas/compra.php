<?php
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoCarrito.php';
include_once 'app/repos/repoDomicilio.php';
include_once 'app/redireccion.inc.php';
include_once 'app/repos/repoCompras.php';
include_once 'app/objetos/compras.php';
include_once 'app/redireccion.inc.php';
include_once 'app/escritores/escritosHelper.inc.php';
include_once 'app/validadores/validadorDom.inc.php';

if (isset($_POST['pagar']) && isset($_POST['envios'])) {
if (!empty($domicilio)) {
  $domicilio = $_POST['envios'];
  $validador = new ValidarDomicilio($domicilio);
  if ($validador) {
    Conexion::abrirConexion();
    $compra_realizada = RepoCompra::realizarCompra(Conexion::getConexion(),$productos, $eventos, $_SESSION['id_usuario'], $domicilio);
      if ($compra_realizada) {
    Redireccion::redirigir(RUTA_USER."/".$_SESSION['id_usuario']);
  }
}else {
  echo "<script>alert('Es necesario ingresar un domicilio')</script>";
}
}
Conexion::cerrarConexion();
}
 ?>
<div class="jumbotron">
  <h1 class="text-center">Realiza tu compra</h1>
</div>

<div class="row separador">
<div class="col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="text-center panel-title">Resumen de compra</h1>
    </div>
    <div class="panel-body">
<table class="table table-responsive">
  <thead>
    <tr>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Costo</th>
    </tr>
  </thead>
  <tbody>
<?php Helper::insertarProductosCarrito($productos, $eventos);?>
<hr>
<tr>
  <th>Costos de envio</th>
  <th></th>
</tr>
  </tbody>
</table>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="text-center panel-title">Datos de envio y entrega</h1>
    </div>
    <div class="panel-body">
      <h4 class="text-center">Selecciona el destino de envio</h4>
  <hr class="featurette-divider">
  <form action="<?php echo RUTA_COMPRA;?>" method="post">
<!--Bloque de codigo  que sirve para obtener los domicilios y vaciarlos en un select-->
<?php Helper::iterarDomicilioOnSelect($domicilio);?>
<!--Bloque de codigo para obtener los domicilios en un select -->
    </div>
  </div>
</div>
</div>


<div class="row">
  <div class="col-md-4">
  </div>
   <div class="col-md-4">
   </div>
   <div class="col-md-4">
       <button class="btn btn-comprar" type="submit" name="pagar">Continuar con el pago</button>
     </form>
   </div>

</div>

 <?php
include_once 'plantillas/cierre.inc.php';
  ?>
