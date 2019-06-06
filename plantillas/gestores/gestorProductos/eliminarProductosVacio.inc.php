<?php
include_once 'app/config.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoProductos.php';

  if (isset($_POST['eliminar'])) {
    $id_producto = $_POST['id_producto'];
    Conexion::abrirConexion();
    RepoProductos::eliminarProducto(Conexion::getConexion(), $id_producto);
    unlink(DIRECTORIO_RAIZ."/productos/".$id_producto.".jpg");
    Conexion::cerrarConexion();

    Redireccion::redirigir(RUTA_INVENTARIO);
  }

 ?>
