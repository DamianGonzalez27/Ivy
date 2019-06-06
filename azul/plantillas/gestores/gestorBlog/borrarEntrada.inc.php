<?php
include_once 'app/config.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoEntradas.php';

if (isset($_POST['borrar_entrada'])) {
  $id_entrada = $_POST['id_borrar'];

  Conexion::abrirConexion();
  RepoEntradas::elminiarComEntradas(Conexion::getConexion(), $id_entrada);
  Conexion::cerrarConexion();

  Redireccion::redirigir(RUTA_PANEL_ENTRADA);
}

 ?>
