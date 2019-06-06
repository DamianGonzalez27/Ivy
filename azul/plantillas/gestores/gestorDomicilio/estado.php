<?php
include_once 'app/repos/repoDomicilio.php';
include_once 'app/redireccion.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/config.inc.php';

if (isset($_POST['ingresar'])) {
  $estado = $_POST['estado'];
  Conexion::abrirConexion();
  $insertar_estado = RepoDomicilio::insertarEstado(Conexion::getConexion(), $estado);
  if ($insertar_estado) {
    Redireccion::redirigir(RUTA_ESTADO);
  }
}
Conexion::cerrarConexion();
 ?>
<div class="row separador">
  <div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Estados en la base</h3>
  </div>
  <div class="panel-body">
<table class="table table-responsive">
  <thead>
    <tr>
      <th>Id Estado</th>
      <th>Estado</th>
    </tr>
  </thead>
  <tbody>
<?php Helper::setEstados($estados);?>
  </tbody>
</table>
  </div>
</div>
  </div>
  <div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Agregar Estado</h3>
  </div>
  <div class="panel-body">
<form role="form" action="<?php echo RUTA_ESTADO;?>" method="post">
<div class="form-group">
<label>Ingresa un estado de la republica</label>
<input type="text" name="estado">
</div>
<div class="form-group">
<button type="submit" name="ingresar" class="btn btn-primary">Enviar</button>
</div>
</form>
  </div>
</div>
  </div>
</div>
