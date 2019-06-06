<?php
if (isset($_POST['asignar'])) {
  $producto = $_POST['producto'];
  $promocion = $_POST['promocion'];
Conexion::abrirConexion();
  $asignar_promo = RepoPromociones::asignarPromocion(Conexion::getConexion(), $producto, $promocion);
  if ($asignar_promo) {
    Redireccion::redirigir(RUTA_ASIGNAR_PROMO);
  }
}
Conexion::cerrarConexion();
 ?>
<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Asigna promociones</h3>
  </div>
  <div class="panel-body">
<div class="row">
<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Productos con promocion</h3>
  </div>
  <div class="panel-body">
<table class="table table-responsive">
  <thead>
    <tr>
      <th>Producto</th>
      <th>Promocion</th>
      <th>Descuento</th>
      <th>Codigo Producto</th>
    </tr>
  </thead>
  <tbody>
<?php Helper::setProductosConPromo($productos_con_promo);?>
  </tbody>
</table>
  </div>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Asigna promociones a tus productos</h3>
  </div>
  <div class="panel-body">
    <form role="form" action="<?php echo RUTA_ASIGNAR_PROMO;?>" method="post">
    <div class="form-group">
      <label>Seleciona un producto</label>
      <select name="producto">
<?php Helper::setProductosOption($productos);?>
      </select>
    </div>
    <div class="form-group">
      <label>Selecciona una promocion</label>
<select name="promocion">
  <?php Helper::setPromocionesOption($promociones);?>
</select>
    </div>
    <div class="form-group">
<button type="submit" name="asignar" class="btn btn-primary">Asignar</button>
    </div>
    </form>
  </div>
</div>
</div>
</div>
  </div>
</div>
