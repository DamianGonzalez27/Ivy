<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoProductos.php';
include_once 'app/redireccion.inc.php';
include_once 'app/objetos/productos.php';
include_once 'app/validadores/validadorProducto.inc.php';
include_once 'app/repos/repoProductos.php';

$id_producto = $_POST['id_editar'];
Conexion::abrirConexion();
$producto = RepoProductos::getProductosById(Conexion::getConexion(), $id_producto);
if (isset($_POST['editar'])) {
  $validador = new ValidadorProducto(
    $_POST['nombre'],
    $_POST['descripcion'],
    $_POST['precio'],
    $_POST['keyword'],
    $_POST['nombre']
  );
if ($validador -> productoValidado()) {
  $producto_actualizado = new Producto(
  $id_producto,
  $validador -> getNombre(),
  $validador -> getDescripcion(),
  $validador -> getPrecio(),
  $validador -> getKeyword(),
  $_POST['categoria'],
  $validador -> getUrlEntrada()
);
$producto_editado = RepoProductos::editarProducto(Conexion::getConexion(), $producto_actualizado);
if ($producto_editado) {
  Redireccion::redirigir(RUTA_INVENTARIO);
}
}
}
Conexion::cerrarConexion();
 ?>
 <div class="panel panel-default separador">
   <div class="panel-heading">
     <h3 class="panel-title text-center">Editar productos</h3>
   </div>
   <div class="panel-body">
   </div>
   <div class="panel-footer">
     <form role="form" action="<?php echo RUTA_EDITAR_PRODUCTO;?>" method="post">
       <?php
       if (isset($_POST['editar'])) {
        include_once 'plantillas/gestores/gestorProductos/productoEditadoValidado.php';
       }else {
         include_once 'plantillas/gestores/gestorProductos/productoEditadoVacio.php';
       }
        ?>
   </div>
 </div>
