<?php

if (isset($_POST['insertar'])) {
  $estado = $_POST['estado'];
  $codigo = $_POST['codigo'];
Conexion::abrirConexion();
  $insertar_codigo = RepoDomicilio::insertarcodigoPostal(Conexion::getConexion(),$codigo, $estado );
  if ($insertar_codigo) {
    Redireccion::redirigir(RUTA_CODIGO_POSTAL);
  }
}
Conexion::cerrarConexion();
 ?>
<div class="row separador">
  <div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Codigos postales existentes</h3>
  </div>
  <div class="panel-body">
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Estado</th>
          <th>Codigo</th>
        </tr>
      </thead>
      <tbody>
<?php Helper::setCodigos($codigos);?>
      </tbody>
    </table>
  </div>
</div>
  </div>
  <div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Ingresar codigo postal</h3>
  </div>
  <div class="panel-body">
<form role="form" action="<?php echo RUTA_CODIGO_POSTAL;?>" method="post">
<div class="form-group">
<label>Selecciona un estado</label>
<select name="estado">
<?php Helper::setEstadosOption($estados);?>
</select>
</div>
<div class="form-group">
<label>Ingresa el codigo postal</label>
<input type="text" name="codigo">
</div>
<div class="form-group">
<button type="submit" name="insertar" class="btn btn-primary">Ingresar</button>
</div>
</form>
  </div>
</div>
  </div>
</div>
