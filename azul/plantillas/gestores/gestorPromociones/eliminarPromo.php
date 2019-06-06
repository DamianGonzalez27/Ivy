<?php
if (isset($_POST['eliminar'])) {
  $id_promocion = $_POST['id_promo'];
Conexion::abrirconexion();
$eliminar_promo = RepoPromociones::eliminarPromo(Conexion::getConexion(), $id_promocion);
  if ($eliminar_promo) {
  Redireccion::redirigir(RUTA_ELIMINAR_PROMO);
  }
}
Conexion::cerrarConexion();
 ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Elimina promociones</h3>
  </div>
  <div class="panel-body">
    <table class="table table-responsive">
      <thead>
        <tr>
          <tr>
            <th>Promocion</th>
            <th>Descuento %</th>
            <th>Opciones</th>
          </tr>
        </tr>
      </thead>
      <tbody>
<?php Helper::setEliminarPromos($promociones);?>
      </tbody>
    </table>
  </div>
</div>
