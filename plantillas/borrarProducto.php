<?php
include_once 'app/config.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoCarrito.php';

if (isset($_POST['eliminar'])) {
  $id_producto = $_POST['id_producto'];
Conexion::abrirConexion();
RepoCarrito::eliminarProductoCarrito(Conexion::getConexion(), $id_producto);
Conexion::cerrarConexion();

Redireccion::redirigir(RUTA_CARRITO);
}

 ?>
