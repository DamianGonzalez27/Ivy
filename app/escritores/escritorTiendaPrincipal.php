<?php
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoProductos.php';
include_once 'app/repos/repoPromociones.php';

class EscritorProductos{
  public static function escribirProductos(){
    Conexion::abrirConexion();
    $productos = RepoProductos::getTodosProductosTienda(Conexion::getConexion());
    if (count($productos)) {
      foreach ($productos as $producto) {
        SELF::escribirProducto($producto);
      }
    }
  }
  public static function escribirProducto($producto){
    if (!isset($producto)) {
      return;
    }
?>
<div class="panel-producto">
  <div class="imagen-producto">
    <img src="<?php echo RUTA_IMGPRODUCTOS.$producto -> getIdPropducto().".jpg";?>" alt="producto">
  </div>
  <div class="descripcion-producto">
    <ul>
      <li><h4><?php echo $producto -> getNombreProducto();?></h4></li>
      <li><h4>$<?php echo $producto -> getPrecioProducto();?> MXN</h4></li>
      <li><?php echo "Hola mundo"; ?></li>
      <li><a href="<?php echo RUTA_PRODUCTO.'/'.$producto -> getUrlProducto();?>" type="button" name="button" class="btn btn-primary">Ver mas</a></li>
    </ul>
  </div>
</div>
<?php
    }
}



 ?>
