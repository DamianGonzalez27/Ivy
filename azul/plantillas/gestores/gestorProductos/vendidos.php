<?php
if (isset($_POST['enviar'])) {
  $id_compra = $_POST['id_compra'];
  $status = 2;
Conexion::abrirConexion();
  $pedido_enviado = RepoCompra::enviarPedido(Conexion::getConexion(), $id_compra, $status);
  if ($pedido_enviado) {
    Redireccion::redirigir(RUTA_VENDIDOS);
  }

}
Conexion::cerrarConexion();
 ?>
<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Pedidos actuales</h3>
  </div>
  <div class="panel-body">
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Usuario</th>
          <th>Producto</th>
          <th>Domicilio</th>
          <th colspan="3">Fecha de compra</th>
        </tr>
      </thead>
      <tbody>
<?php Helper::setProductosVendidos($ventas);?>
      </tbody>
    </table>
  </div>
</div>
