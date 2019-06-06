<?php
if (isset($_POST['facturar'])) {
  $id_compra = $_POST['id_compra'];
  $status = 5;
Conexion::abrirConexion();
  $pedido_enviado = RepoCompra::enviarPedido(Conexion::getConexion(), $id_compra, $status);
  if ($pedido_enviado) {
    Redireccion::redirigir(RUTA_FACTURAS);
  }

}
Conexion::cerrarConexion();
 ?>
<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Facturas</h3>
  </div>
  <div class="panel-body">
    <table class="table table-responsive">
      <thead>
<tr>
  <th>Cliente</th>
  <th>Producto</th>
  <th>Domicilio</th>
  <th>Fecha de compra</th>
  <th>RFC cliente</th>
</tr>
      </thead>
      <tbody>
        <?php Helper::setProductosFactura($productos_facturados); ?>
      </tbody>
    </table>
  </div>
</div>
