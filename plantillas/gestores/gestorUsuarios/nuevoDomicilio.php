<?php
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/repos/repoUsuario.php';
include_once 'app/repos/repoDomicilio.php';
include_once 'app/conexion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/objetos/domicilio.php';
Conexion::abrirConexion();
$id_usuario = $_SESSION['id_usuario'];
if (isset($_POST['registrar'])) {
  $domicilio = new Domicilio('',
    $_POST['estado'],
    $_POST['codigo_postal'],
    $_POST['municipio'],
    $_POST['colonia'],
    $_POST['no_interior'],
    $_POST['no_exterior'],
    $_POST['localidad'],
    $_POST['calle'],
    $_POST['observaciones'],
    $id_usuario
  );

  $insertar = RepoDomicilio::insertarDomicilioUsuario(Conexion::getConexion(), $domicilio);

  if ($insertar) {
    Redireccion::redirigir(RUTA_USER.'/'.$_SESSION['id_usuario']);
  }
}
Conexion::cerrarConexion();
 ?>
 <div class="jumbotron">
   <h1 class="text-center">Agrega tu domicilio</h1>
 </div>

  <div class="container">
    <div class="panel panel-default separador">
      <div class="panel-heading">
        <h3 class=" text-center panel-title">Ingresa tu domicilio</h3>
      </div>
      <div class="panel-body">
  <form role="form" action="<?php echo RUTA_NUEVO_DOMICILIO;?>" method="post">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Calle*</label>
          <input type="text" name="calle" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Localidad*</label>
          <input type="text" name="localidad">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Numero interior</label>
          <input type="text" name="no_interior">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Numero Exterior</label>
          <input type="text" name="no_exterior">
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Estado*</label>
          <input type="text" name="estado">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Municipio*</label>
          <input type="text" name="municipio">
        </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Colonia*</label>
          <input type="text" name="colonia">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Codigo postal</label>
          <input type="text" name="codigo_postal">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Observaciones</label>
          <textarea class="form-control text-justify texto-entrada" name="observaciones"></textarea>
        </div>
      </div>
    </div>
    <div class="form-froup">
      <button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
    </div>
  </form>
      </div>
      <div class="panel-footer">
    <p>Recuerda registrar adecuadamente tu domicilio ya que es en esta direccion en donde te llegaran tus compras</p>
    <p>Los campos marcados con (*) son necesarios</p>
    <p>Si existe algun error favor de comunicarte con nosotros</p>
      </div>
    </div>
  </div>

<?php
  include_once 'plantillas/cierre.inc.php';
 ?>
