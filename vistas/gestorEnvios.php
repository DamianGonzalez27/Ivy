<?php
$titulo = 'Gestor Envios';
$descipcion = 'Blog informativo de Azul Diagnostic';
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'plantillas/gestores/gestorEnvios/gestor.inc.php';
include_once 'app/repos/repoEntradas.php';
include_once 'app/objetos/entrada.php';
include_once 'app/conexion.inc.php';
include_once 'app/controlSesion.inc.php';
include_once 'app/escritores/escritosHelper.inc.php';

switch ($gestor_actual) {
  case 'crear-cargo':
  include_once 'plantillas/gestores/gestorEnvios/crear-cargo.php';
    break;
  case 'gestionar-cargos':
  include_once 'plantillas/gestores/gestorEnvios/gestionar-cargos.php';
    break;
  default:
include_once 'plantillas/gestores/gestorEnvios/principal.php';
    break;
}

include_once 'plantillas/gestores/gestorEnvios/gestorCierre.inc.php';
include_once 'plantillas/cierre.inc.php';

 ?>
