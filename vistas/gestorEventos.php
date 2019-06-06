<?php
$titulo = 'Gestor Eventos';
$descipcion = 'Blog informativo de Azul Diagnostic';
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'plantillas/gestores/gestorEventos/gestor.inc.php';
include_once 'app/repos/repoEntradas.php';
include_once 'app/objetos/entrada.php';
include_once 'app/conexion.inc.php';
include_once 'app/controlSesion.inc.php';
include_once 'app/escritores/escritosHelper.inc.php';
include_once 'app/repos/repoEvento.php';

switch ($gestor_actual) {
  case 'nuevo-evento':
  include_once 'plantillas/gestores/gestorEventos/nuevo.php';
    break;
  case 'eliminar-evento':
  include_once 'plantillas/gestores/gestorEventos/eliminar.php';
    break;

  default:
  Conexion::abrirConexion();
  $eventom = RepoEvento::getEventos(Conexion::getConexion());
  include_once 'plantillas/gestores/gestorEventos/principal.php';
  Conexion::cerrarConexion();
    break;
}
include_once 'plantillas/gestores/gestorEventos/gestorCierre.inc.php';
include_once 'plantillas/cierre.inc.php';
 ?>
