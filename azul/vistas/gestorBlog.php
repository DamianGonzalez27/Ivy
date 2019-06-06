<?php
$titulo = 'Gestor Blog';
$descipcion = 'Blog informativo de Azul Diagnostic';
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'plantillas/gestores/gestorBlog/gestor.inc.php';
include_once 'app/repos/repoEntradas.php';
include_once 'app/objetos/entrada.php';
include_once 'app/conexion.inc.php';
include_once 'app/controlSesion.inc.php';

switch ($gestor_actual) {
  case 'escribir-entrada':
    include_once 'plantillas/gestores/gestorBlog/escribir-entrada.inc.php';
    break;
  case 'panel-entradas':
    include_once 'app/escritores/escritorEntradas.inc.php';
    include_once 'plantillas/gestores/gestorBlog/panelEntradas.inc.php';
    break;
  case 'borrar-entrada':
    include_once 'plantillas/gestores/gestorBlog/borrarEntrada.inc.php';
    break;
  default:
    include_once 'plantillas/gestores/gestorBlog/principal.inc.php';
    break;
}
include_once 'plantillas/gestores/gestorBlog/gestorCierre.inc.php';
include_once 'plantillas/cierre.inc.php';
 ?>
