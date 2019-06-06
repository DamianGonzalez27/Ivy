<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/repos/repoRecuperacion.inc.php';
include_once 'plantillas/apertura.inc.php';
//include_once 'plantillas/barra-nav.inc.php';
include_once 'app/repos/repoUsuario.php';
Conexion::abrirConexion();

if (isset($_POST['validar'])) {
$id_usuario = $_POST['usuario'];
$activado = RepoUsuario::activarUsuario(Conexion::getConexion(), $id_usuario);

if ($activado) {
  Redireccion::redirigir(RUTA_LOGIN);
}
}

$usuario = RepoRecuperacion::validarUrl(Conexion::getConexion(), $url);
Conexion::cerrarConexion();
if (!empty($usuario)) {
  include_once 'plantillas/gestores/gestorUsuarios/activar.php';
}else {
  include_once 'vistas/404.php';
}

include_once 'plantillas/cierre.inc.php';
 ?>
