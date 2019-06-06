<?php
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoProductos.php';

class EscribirProductosLista{

  public static function escribirProductos(){
    Conexion::abrirConexion();
    $productos = RepoProductos::getTodosProductosTienda(Conexion::getConexion());
    if (count($productos)) {
      foreach ($productos as $producto) {
      SELF::escribirProducto($producto);
      }
    }
    Conexion::cerrarConexion();
  }
  public static function escribirProducto($producto){
    if (!isset($producto)) {
      return;
    }
 ?>
<option <?php echo 'value="'.$producto -> getIdPropducto().'"';?>><?php
echo "Id Producto:  ";
echo $producto -> getIdPropducto();
echo " || Nombre Producto:  ";
echo $producto -> getNombreProducto();
 ?></option>
<?php
}
}
 ?>
