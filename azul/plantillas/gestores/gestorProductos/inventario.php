<?php
if (isset($_POST['editar'])) {
$id_producto = $_POST['id_producto'];
$precio = $_POST['precio'];
$palabra = $_POST['palabra'];
$stock = $_POST['stock'];
  Conexion::abrirConexion();
  $editar_producto = RepoProductos::editarProducto(
  Conexion::getConexion(),
  $id_producto,
  $precio,
  $palabra,
  $stock
);
if ($editar_producto) {
  Redireccion::redirigir(RUTA_INVENTARIO);
}

Conexion::cerrarConexion();
}
 ?>
<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title">Revisa el inventario</h3>
  </div>
  <div class="panel-body">
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Id Producto</th>
          <th>Nombre producto</th>
          <th>Descripcion de producto</th>
          <th>Precio</th>
          <th>Keywords</th>
          <th>Stock</th>
          <th>Codigo</th>
        </tr>
      </thead>
      <tbody>
        <?php Helper::setProductos($productos);?>
      </tbody>
    </table>
  </div>
</div>
