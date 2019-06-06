<?php
$titulo = $producto -> getNombreProducto();
$descipcion = $producto -> getDescripcionProducto();
$keywords = $producto -> getKeywordProducto();
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/repos/repoCompras.php';
include_once 'app/conexion.inc.php';
include_once 'app/escritores/escritorProductosAzar.php';
include_once 'plantillas/modals/modalProducto.inc.php';
include_once 'app/repos/repoCarrito.php';
include_once 'app/objetos/carrito.php';
include_once 'app/redireccion.inc.php';
include_once 'app/controlSesion.inc.php';
include_once 'app/repos/repoProductos.php';
include_once 'app/escritores/escritosHelper.inc.php';
Conexion::abrirConexion();
if(isset($_POST['carrito'])){
$id_producto = $_POST['id_producto'];
$producto_existe = RepoCarrito::getCarritoByIdProducto(Conexion::getConexion(), $id_producto, $id_usuario);
if ($producto_existe){
$producto_actualizado = RepoCarrito::sumarProductoCarrito(Conexion::getConexion(),
  $_POST['cantidadCarrito'],
  $id_producto,
  $id_usuario
);
if ($producto_actualizado) {
Redireccion::redirigir(RUTA_CARRITO);
}
}else{
  $carrito = new Carrito(
    $id_usuario,
    $id_producto,
    $_POST['cantidadCarrito']
  );
  $carrito_insertado = RepoCarrito::insertarCarrito(Conexion::getConexion(), $carrito);
  if ($carrito_insertado) {
    Redireccion::redirigir(RUTA_CARRITO);
  }
}
}
Conexion::cerrarConexion();
 ?>
  <div class="posicion">
  <div class="row">
<!--Segmento principal y de vista-->
<?php Helper::productosPane($producto);?>
<!--Segmento principal y de vista-->

<!--Segmento de panel lateral-->
<!--Cabecera del panel lateral-->
<?php Helper::insertarPanelLateralProducto($producto, $categoria);?>
<!--Cabecera del panel lateral-->

<!--Cuerpo del panel latera-->
<div class="panel panel-default eliminar-espacio">
<div class="panel-body">
  <h3><i class="fa fa-credit-card" aria-hidden="true"></i> Formas de pago</h3><br>
  <div class="panel-seccion">
    <ul>
      <li><img src="<?php echo RUTA_IMAGENES;?>/imagenes/master.png" alt="Mastercard"></li>
      <li><img src="<?php echo RUTA_IMAGENES;?>/imagenes/visa.png" alt="Visa"></li>
      <li><img src="<?php echo RUTA_IMAGENES;?>/imagenes/amex.png" alt="American Express"></li>
    </ul>
    <a href="#formasPago" role="button" data-toggle="modal">Mas informacion</a>
  </div>
  <h3><i class="fa fa-truck" aria-hidden="true"></i> Metodos de envio</h3><br>
  <div class="panel-seccion">
    <ul>
      <li><img src="<?php echo RUTA_IMAGENES;?>/imagenes/dhl.png" alt="Visa"></li>
      <li><img src="<?php echo RUTA_IMAGENES;?>/imagenes/estafeta.png" alt="Visa"></li><br>
      <li class="precio-producto">Envios a todo el pais</li>
    </ul>
    <a href="#formasEnvio" role="button" data-toggle="modal">Mas informacion</a>
  </div>
  <h3><i class="fa fa-certificate" aria-hidden="true"></i> Garantia</h3><br>
  <div class="panel-seccion">
    <ul>
      <li><img src="<?php echo RUTA_IMAGENES;?>/imagenes/garantia.png" alt="Visa"></li><br>
      <li class="precio-producto">Satisfaccion garantizada</li>
    </ul>
    <a href="#">Mas informacion</a>
  </div>
  <h3>Cantidad de producto</h3><br>
<form action="<?php echo RUTA_PRODUCTO.'/'.$producto -> getUrlProducto();?>" method="post">
    <div class="form-group comprar">
      <button type="button" name="button" class="disminuir" id="disminuir"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
      <input type="number" name="cantidad" class="cantidad" id="cantidad" value="1" inputmode="numeric">
      <button type="button" name="button" class="aumentar" id="aumentar"><i class="fa fa-angle-up" aria-hidden="true"></i></button><br>
      <br>
      <label>Productos en Stock: </label>
      <label><?php echo $producto -> getStock();?></label>
      <input type="hidden" name="stock" id="stock" value="<?php echo $producto -> getStock();?>">
    </div><br>
    <div class="row">
      <div class="col-md-6">
      </div>
      <div class="col-md-6">
    <?php
    if (ControlSesion::sesionIniciada()) {
      ?>
        <div class="form-group">
        <input type="hidden" name="cantidadCarrito" id="cantidadCarrito" value="1" inputmode="numeric">
        <input type="hidden" name="id_producto" value="<?php echo $producto -> getIdPropducto();?>">
        <button type="submit" name="carrito" class="btn btn-carrito">Agregar al carrito</button>
        </div>
      </form>
      <?php
    }else {?>
      <a href="<?php echo RUTA_LOGIN?>" type="submit" name="carrito" class="btn btn-carrito">Agregar al carrito</a>
    <?php
    }?>
      </div>
    </div>
</div>
</div>
</div>
<!--Cuerpo del panel latera-->
<!--Segmento de panel lateral-->

<!--Segmento de productos similares-->
    </div>
    <div class="row">
      <div class="productos-relacionados alinearProductos">
        <h1 class="text-center">Tambien te puede interesar</h1>
  <?php
  EscribirProductosRandom::escribirProductos($producto -> getCategoriaProducto());
   ?>
      </div>
    </div>
<!--Segmento de productos similares-->
  </div>


<?php
include_once 'plantillas/cierre.inc.php';
?>
