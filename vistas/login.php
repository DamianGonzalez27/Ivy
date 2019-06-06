<?php
$titulo = 'Log Ig';
$descipcion = 'Inicio de sesion de Azul Diagnostic';
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoUsuario.php';
include_once 'app/controlSesion.inc.php';
include_once 'app/validadores/validadorIniciar.php';
include_once 'app/redireccion.inc.php';

if (ControlSesion::sesionIniciada()) {
Redireccion::redirigir(SERVIDOR);
}
if (isset($_POST['iniciar'])) {
  Conexion::abrirConexion();
  $validador = new Login($_POST['email'], $_POST['clave'], Conexion::getConexion());

  if ($validador -> getError() === '' && !is_null($validador -> getUsuario())) {
    //Se inicia sesion
  ControlSesion::IniciarSesion(
    $validador -> getUsuario() -> getIdUsaurio(),
    $validador -> getUsuario() -> getNombreUsuario(),
    $validador -> getUsuario() -> getNivelUsuario()
  );
  Redireccion::redirigir(SERVIDOR);
  }
  Conexion::cerrarConexion();
}
 ?>
  <div class="jumbotron">
    <h1 class="text-center">Inicia sesion</h1>
  </div>
<div class="row separador">
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">
 <div class="panel-body">
         <br>
            <form role="form" method="POST" action="<?php echo RUTA_LOGIN;?>">
            <div class="form-group">
            <label><i class="fa fa-user" aria-hidden="true"></i> Usuario</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Usuario, email, telefono" required <?php
            if (isset($_POST['email']) && !empty($_POST['email'])) {
              echo 'value="'.$_POST['email'].'"';
            }
             ?>>
            </div>
            <div class="form-group">
            <label><i class="fa fa-key" aria-hidden="true"></i> Contraseña</label>
            <input type="password" class="form-control" name="clave" id="clave" placeholder="*****************" required>
            <?php
            if (isset($_POST['iniciar'])) {
              $validador -> setError();
            }
             ?>
            </div>
             <br>
            <button type="submit" class="btn bt-lg btn-primary btn-block" name="iniciar">Logg In</button>
            <br>
            <br>
            <p><a href="#">Olvide mi contraseña</a></p>
            <p><a href="<?php echo RUTA_REGISTRO; ?>">Registrarme</a></p>


          </form>
       </div>
     </div>
  </div>
</div>

<?php
include_once 'plantillas/cierre.inc.php';
?>
