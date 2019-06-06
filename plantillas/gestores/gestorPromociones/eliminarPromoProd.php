<?php
if(isset($_POST['eliminar'])){
  $producto = $_POST['producto'];
  $promo = $_POST['promocion'];
  Conexion::abrirConexion();
  $eliminar_prod = RepoPromociones::eliminarProdConPromo(Conexion::getConexion(), $producto, $promo);
  if ($eliminar_prod) {
    Redireccion::redirigir(RUTA_ELIMINAR_PROMO_PROD);
  }
}
Conexion::cerrarConexion();
 ?>

<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Eliminar promociones asignadas</h3>
  </div>
  <div class="panel-body">
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Codigo Producto</th>
          <th>Promocion</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
<?php Helper::setProductosPromoDelete($productos_con_promo);?>
      </tbody>
    </table>
  </div>
</div>
