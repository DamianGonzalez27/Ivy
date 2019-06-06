<?php

include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/objetos/usuario.php';
include_once 'app/repos/repoUsuario.php';
include_once 'app/validadores/validadorRegistro.php';
include_once 'app/redireccion.inc.php';
include_once 'scripts/registro.inc.php';

if (isset($_POST['enviar'])) {
Conexion::abrirConexion();
$validador = new ValidadorRegistro($_POST['nombre'],$_POST['apellido'], $_POST['correo'], $_POST['clave1'],$_POST['clave2'],
Conexion::getConexion());
if ($validador -> registroValido()) {
$usuario = new Usuario('',$validador -> getNombre(), $validador -> getApellido(), $validador -> getCorreo(), 1, '', $_POST['telefono'], password_hash($validador -> getClave(),PASSWORD_DEFAULT));
$insertar = RepoUsuario::insertarUsuario(Conexion::getConexion(), $usuario);

if ($insertar) {
  $verificar = Registro::verificar(Conexion::getConexion(), $validador -> getCorreo());
  if ($verificar) {
    Redireccion::redirigir(RUTA_REGCORRECTO);
  }
}
}
Conexion::cerrarConexion();
}
 ?>
 <div class="jumbotron text-center">
   <h1>Registrate</h1>
 </div>

 <div class="inicio">

   <div class="row text-center">
     <div class="col-md-3">
       <div class="panel panel-default">
       				<div class="panel-heading">
       					<h3 class="panel-title">Registrate</h3>
       				</div>
       				<div class="panel-body">
       					<br>
       		<form role="form" method="POST" action="<?php echo RUTA_REGISTRO; ?>">
            <?php
            if (isset($_POST['enviar'])) {
              include_once 'plantillas/registros/registroLoginValidado.inc.php';
            }else{
              include_once 'plantillas/registros/registroLogin.inc.php';
            }
             ?>

         </form>
       				</div>
       			</div>
     </div>
     <div class="col-md-7">
      <video src="<?php echo RUTA_IMAGENES?>/videos/azul.mp4" poster="<?php echo RUTA_IMAGENES?>/imaenes/azulLogo.jpg" class="imagenRegistro" controls>
      </video>
     </div>
   </div>
 </div>


<?php
 include_once 'plantillas/cierre.inc.php';
 ?>
