<?php
if (isset($_POST['entregar'])) {
  $id_compra = $_POST['id_compra'];
  $status = 3;
Conexion::abrirConexion();
  $pedido_enviado = RepoCompra::enviarPedido(Conexion::getConexion(), $id_compra, $status);
  if ($pedido_enviado) {
    Redireccion::redirigir(RUTA_ENVIADOS);
  }

}
Conexion::cerrarConexion();
 ?>
<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Revisa los productos enviados</h3>
  </div>
  <div class="panel-body">
    <table class="table table-responsive">
      <thead>
<tr>
  <th>Cliente</th>
  <th>Producto</th>
  <th>Domicilio</th>
  <th>Fecha de compra</th>
  <th colspan="2">Opciones</th>
</tr>
      </thead>
      <tbody>
        <?php Helper::setProductosEntregados($envios);?>
      </tbody>
    </table>
  </div>
</div>
