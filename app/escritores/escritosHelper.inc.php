<?php
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoEvento.php';
/*Esta clase nos ayuda a ordenar el codigo*/
class Helper{

#Esta funcion inserta los datos del domicilio del usuaario en un select
  public static function iterarDomicilioOnSelect($domicilio){
    if (count($domicilio)) {
      ?>
      <select name="envios">
      <?php
for ($i=0; $i <count($domicilio); $i++) {
  $domicilio_actual = $domicilio[$i][0];
    ?>
    <option value="<?php echo $domicilio_actual -> getIdDomicilio();?>">
      <?php echo $domicilio_actual -> getColonia()." || ".$domicilio_actual -> getCalle()." || ". $domicilio_actual -> getNoInterior();?>
    </option>
    <?php
}
      ?>
    </select>
      <?php
    }else {
?>
<a href="<?php echo RUTA_NUEVO_DOMICILIO;?>" class="btn btn-default" type="button">Ingresar nuevo</a>
<?php
    }
  }

#Esta funcion ordena los datos del carrito
public static function insertarProductosCarrito($productos, $eventos){
  for ($i=0; $i < count($productos); $i++) {
    $producto_actual = $productos[$i][0];
    $cantidad = $productos[$i][1];
?>
<tr>
  <th><?php echo $producto_actual -> getNombreProducto();?></th>
  <th><?php echo $cantidad;?></th>
  <th>$<?php echo $producto_actual -> getPrecioProducto();?> MXN</th>
</tr>
<?php
    }

  for ($i=0; $i < count($eventos); $i++) {
    $evento_actual = $eventos[$i][0];
    $cantidad = 1;
    ?>
    <tr>
      <th><?php echo $evento_actual -> getNombreEvento();?></th>
      <th>1</th>
      <th>$<?php echo $evento_actual -> getPrecioEvento();?> MXN</th>
    </tr>
    <?php
  }
}


#Esta funcion crea el panel de compra del carrito de compras
public static function insertarPanelCarrito($productos, $eventos){
  $auxiliar = 0;
  for ($i=0; $i < count($productos); $i++) {
    $producto_actual = $productos[$i][0];
    $cantidad = $productos[$i][1];
    $precio_total = $cantidad * $producto_actual -> getPrecioProducto();
    $auxiliar = $auxiliar + $precio_total;
?>
<tr>
  <th><?php echo $producto_actual -> getNombreProducto();?></th>
  <th><?php echo $cantidad;?></th>
  <th>$<?php echo $precio_total;?> MXN</th>
  <th>
    <form role="form" action="<?php echo RUTA_CARRITO?>" method="post">
      <input type="hidden" name="producto" value="<?php echo $producto_actual -> getIdPropducto();?>">
      <button type="submit" name="eliminar" class="btn btn-eliminar"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
    </form>
  </th>
</tr>
<?php
    }


  for ($i=0; $i < count($eventos); $i++) {
    $evento_actual = $eventos[$i][0];
    $auxiliar = $auxiliar + $evento_actual -> getPrecioEvento();
    ?>
    <tr>
      <th><?php echo $evento_actual -> getNombreEvento();?></th>
      <th>1</th>
      <th>$<?php echo $evento_actual -> getPrecioEvento();?> MXN</th>
      <th>
        <form role="form" action="<?php echo RUTA_CARRITO?>" method="post">
          <input type="hidden" name="id_evento" value="<?php echo $evento_actual -> getIdEvento();?>">
          <button type="submit" name="eliminar_evento" class="btn btn-eliminar"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
        </form>
      </th>
    </tr>
    <?php
  }
  ?>
</tbody>
</table>
<hr class="featurette-divider">
<table class="table table-responsive">
 <thead>
         <tr>
           <th>Total</th>
           <th>$<?php echo $auxiliar;?> MXN</th>
         </tr>
     </thead>
     <tbody>
       <tr>
         <th>
           <a href="<?php echo RUTA_COMPRA;?>" class="btn btn-comprar">Comprar</a>
         </th>
       </tr>
     </tbody>
</table>
  <?php
}

#Funcion para insertar los datos de los eventos en la vista
public static function insertarEventos($eventos){
  if (count($eventos)) {
    for ($i=0; $i < count($eventos); $i++) {
      $evento_actual = $eventos[$i][0];
      $domicilio = $eventos[$i][1];
      ?>
      <tr>
        <th><?php echo $evento_actual -> getNombreEvento();?></th>
        <th><?php echo $domicilio;?></th>
        <th><?php echo $evento_actual -> getFechaEvento();?></th>
        <th>
          <?php
          if (ControlSesion::sesionIniciada()) {
            ?>
            <form role="form" action="<?php echo RUTA_EVENTO;?>" method="post">
              <input type="hidden" name="id_evento" value="<?php echo $evento_actual -> getIdEvento();?>">
              <button type="submit" name="comprar" class="btn btn-comprar">$<?php
              echo $evento_actual -> getPrecioEvento();
               ?> MXN</button>
            </form>
            <?php
    }else {
    ?>
      <a href="<?php echo RUTA_LOGIN?>" class="btn btn-comprar">$<?php echo $evento_actual -> getPrecioEvento();?> MXN</a>
    <?php
    }
    ?>
      </th>
    </tr>
    <?php
  }
}else {
    ?>
    <tr>
      <th colspan="4"> No hay eventos actualmete</th>
    </tr>
    <?php
  }
}

#Funcion que sirve para insertar el panel principal del producto
public static function productosPane($producto){
?>
<div class="col-md-8">
  <div class="panelProductoPrincipal">
    <div class="imagenesProducto">
    <img src="<?php echo RUTA_IMGPRODUCTOS.$producto -> getIdPropducto().".jpg";?>" alt="producto">
    </div>
      <hr class="featurette-divider">
    <div class="descripcionProducto">
      <h1><?php echo $producto -> getNombreProducto();?></h1>
       <br>
       <p><?php echo $producto -> getDescripcionProducto();?></p>
    </div>
  </div>
</div>
<?php
}
#esta funcion nos devuelve las promociones que cada producto puede tener
public static function insertarPanelLateralProducto($producto, $categoria){

?>
<div class="col-md-4 panelProductoDescripcion">
    <h1><?php echo $producto -> getNombreProducto();?></h1>
    <h3><?php echo $categoria -> getNombreCategoria();?></h3>
<h1 class="precio-producto">$<?php echo $producto -> getPrecioProducto();?> MXN</h1>
<?php

}

#Esta funcion escribe los produyctos comprados por el usuario
public static function getPedidosUser($productos){
  if (count($productos)) {
    for ($i=0; $i < count($productos); $i++) {
      $domicilio = $productos[$i][0];
      $producto = $productos[$i][1];
      $usuario = $productos[$i][2];
      $cantidad = $productos[$i][3];
      $fecha =$productos[$i][4];
      $compra = $productos[$i][5];
      $status = $productos[$i][6];
    ?>
  <tr>
    <th>0<?php echo $compra;?></th>
    <th><?php
    if ($status == 1) {
print "Producto pendiente";
    }
     ?></th>
     <th><?php echo $fecha;?></th>
     <th><a href="#<?php echo $compra;?>" class="btn btn-primary" role="button" data-toggle="modal">Ver...</a></th>
  </tr>
    <?php
}
  }
}

public static function getEnviados($productos){
  if (count($productos)) {
    for ($i=0; $i < count($productos); $i++) {
      $domicilio = $productos[$i][0];
      $producto = $productos[$i][1];
      $usuario = $productos[$i][2];
      $cantidad = $productos[$i][3];
      $fecha =$productos[$i][4];
      $compra = $productos[$i][5];
      $status = $productos[$i][6];
    ?>
  <tr>
    <th>0<?php echo $compra;?></th>
    <th><?php
    if ($status == 2) {
  print "Producto enviado";
    }
     ?></th>
     <th><?php echo $fecha;?></th>
     <th><a href="#<?php echo $compra;?>" class="btn btn-primary" role="button" data-toggle="modal">Ver...</a></th>
  </tr>
    <?php
  }
  }
}

#esta funcion imprime los productos para realizar factura
public static function getProductosFactura($productos){
if (count($productos)) {
  for ($i=0; $i <count($productos); $i++) {
    $domicilio = $productos[$i][0];
    $producto = $productos[$i][1];
    $usuario = $productos[$i][2];
    $cantidad = $productos[$i][3];
    $fecha =$productos[$i][4];
    $compra = $productos[$i][5];
    $status = $productos[$i][6];
    ?>
<tr>
  <th>0<?php echo $compra;?></th>
  <th><?php echo $fecha;?></th>
  <th><a href="#<?php echo $compra;?>" class="btn btn-primary" role="button" data-toggle="modal">Ver...</a></th>
  <th>
     <div class="form-group">
       <input type="hidden" name="id_producto" value="<?php echo $compra;?>">
       <button class="btn btn-primary" type="submit" name="facturar">Solicitar factura</button>
     </div>
 </th>
</tr>
    <?php
  }
}
}

public static function getPendientesFactura($productos_pendientes){
  if (count($productos_pendientes)) {
    for ($i=0; $i <count($productos_pendientes); $i++) {
      $domicilio = $productos_pendientes[$i][0];
      $producto = $productos_pendientes[$i][1];
      $usuario = $productos_pendientes[$i][2];
      $cantidad = $productos_pendientes[$i][3];
      $fecha =$productos_pendientes[$i][4];
      $compra = $productos_pendientes[$i][5];
      $status = $productos_pendientes[$i][6];
      ?>
  <tr>
    <th>0<?php echo $compra;?></th>
    <th><?php echo $fecha;?></th>
    <th><a href="#<?php echo $compra;?>" class="btn btn-primary" role="button" data-toggle="modal">Ver...</a></th>
    <th>Factura pendiente</th>
  </tr>
      <?php
    }
  }
}

#Esta funcion nos devuelve los productos facturados y los imprime
public static function getFacturados($productos_facturados){
  if (count($productos_facturados)) {
    for ($i=0; $i <count($productos_facturados); $i++) {
      $domicilio = $productos_facturados[$i][0];
      $producto = $productos_facturados[$i][1];
      $usuario = $productos_facturados[$i][2];
      $cantidad = $productos_facturados[$i][3];
      $fecha =$productos_facturados[$i][4];
      $compra = $productos_facturados[$i][5];
      $status = $productos_facturados[$i][6];
      ?>
  <tr>
    <th>0<?php echo $compra;?></th>
    <th><?php echo $fecha;?></th>
    <th><a href="#<?php echo $compra;?>" class="btn btn-primary" role="button" data-toggle="modal">Ver...</a></th>
    <th>Compra facturada</th>
  </tr>
      <?php
    }
  }
}

#Esta funcion nos imprime los eventos dentro de una lista
public static function mostrarEventos($eventos){
  if (count($eventos)) {
    for ($i=0; $i <count($eventos); $i++) {
      $evento_actual = $eventos[$i][0];
      $domicilio = $eventos[$i][1];
      ?>
      <tr>
        <th><?php echo $evento_actual -> getNombreEvento();?></th>
        <th><?php echo $domicilio -> getEstadoIdEstado();?></th>
        <th><?php echo $evento_actual -> getFechaEvento();?></th>
        <th>
          <form role="form" action="<?php  ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $evento_actual -> getIdEvento();?>">
            <button type="submit" name="ver" class="btn btn-primary">Ver ...</button>
          </form>
        </th>
      </tr>
      <?php
    }
  }
}

#Esta funcioion nos devuelve los productos vendidos
public static function setProductosVendidos($productos){
  if (count($productos)) {
    for ($i=0; $i < count($productos); $i++) {
      $domicilio = $productos[$i][0];
      $producto = $productos[$i][1];
      $usuario = $productos[$i][2];
      $cantidad = $productos[$i][3];
      $fecha =$productos[$i][4];
      $compra = $productos[$i][5];
      ?>
      <tr>
        <th><?php echo $usuario -> getNombreUsuario() ." " . $usuario -> getApellidoUsuario();?></th>
        <th><?php echo $producto -> getNombreProducto();?></th>
        <th><?php echo $domicilio -> getEstadoIdEstado().", ". $domicilio -> getMunicipioIdMunicipio().", ". $domicilio -> getCodigoPostal();?></th>
        <th><?php echo $fecha;?></th>
        <th><a href="#<?php echo $compra;?>" class="btn btn-primary" role="button" data-toggle="modal">Ver...</a></th>
        <th>
        <form role="form" action="<?php echo RUTA_VENDIDOS;?>" method="post">
          <div class="form-group">
            <input type="hidden" name="id_compra" value="<?php echo $compra;?>">
            <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
          </div>
        </form>
      </th>
      </tr>
      <?php
    }
  }
}

#Con esta funcion mandamos a traer los datos de las facturas en solicitud
public static function setProductosFactura($productos){
  if (count($productos)) {
    for ($i=0; $i < count($productos); $i++) {
      $domicilio = $productos[$i][0];
      $producto = $productos[$i][1];
      $usuario = $productos[$i][2];
      $cantidad = $productos[$i][3];
      $fecha =$productos[$i][4];
      $compra = $productos[$i][5];
      $rfc = $productos[$i][6];
      ?>
      <tr>
        <th><?php echo $usuario -> getNombreUsuario() ." " . $usuario -> getApellidoUsuario();?></th>
        <th><?php echo $producto -> getNombreProducto();?></th>
        <th><?php echo $domicilio -> getEstadoIdEstado().", ". $domicilio -> getMunicipioIdMunicipio().", ". $domicilio -> getCodigoPostal();?></th>
        <th><?php echo $fecha;?></th>
        <th><?php echo $rfc;?></th>
        <th><a href="#<?php echo $compra;?>" class="btn btn-primary" role="button" data-toggle="modal">Ver...</a></th>
        <th>
        <form role="form" action="<?php echo RUTA_FACTURAS;?>" method="post">
          <div class="form-group">
            <input type="hidden" name="id_compra" value="<?php echo $compra;?>">
            <button type="submit" name="facturar" class="btn btn-primary">Enviar</button>
          </div>
        </form>
      </th>
      </tr>
      <?php
    }
  }
}

public static function setProductosHistorico($productos){
  if (count($productos)) {
    for ($i=0; $i < count($productos); $i++) {
      $domicilio = $productos[$i][0];
      $producto = $productos[$i][1];
      $usuario = $productos[$i][2];
      $cantidad = $productos[$i][3];
      $fecha =$productos[$i][4];
      $compra = $productos[$i][5];
      ?>
      <tr>
        <th><?php echo $usuario -> getNombreUsuario() ." " . $usuario -> getApellidoUsuario();?></th>
        <th><?php echo $producto -> getNombreProducto();?></th>
        <th><?php echo $domicilio -> getEstadoIdEstado().", ". $domicilio -> getMunicipioIdMunicipio().", ". $domicilio -> getCodigoPostal();?></th>
        <th><?php echo $fecha;?></th>
        <th><a href="#<?php echo $compra;?>" class="btn btn-primary" role="button" data-toggle="modal">Ver...</a></th>
        <th>
      </th>
      </tr>
      <?php
    }
  }
}

#Esta funcion nos manda a llamar todos los productos entregados
public static function setProductosEntregados($productos){
  if (count($productos)) {
    for ($i=0; $i < count($productos); $i++) {
      $domicilio = $productos[$i][0];
      $producto = $productos[$i][1];
      $usuario = $productos[$i][2];
      $cantidad = $productos[$i][3];
      $fecha =$productos[$i][4];
      $compra = $productos[$i][5];
      ?>
      <tr>
        <th><?php echo $usuario -> getNombreUsuario() ." " . $usuario -> getApellidoUsuario();?></th>
        <th><?php echo $producto -> getNombreProducto();?></th>
        <th><?php echo $domicilio -> getEstadoIdEstado().", ". $domicilio -> getMunicipioIdMunicipio().", ". $domicilio -> getCodigoPostal();?></th>
        <th><?php echo $fecha;?></th>
        <th><a href="#<?php echo $compra;?>" class="btn btn-primary" role="button" data-toggle="modal">Ver...</a></th>
        <th>
        <form role="form" action="<?php echo RUTA_ENVIADOS;?>" method="post">
          <div class="form-group">
            <input type="hidden" name="id_compra" value="<?php echo $compra;?>">
            <button type="submit" name="entregar" class="btn btn-primary">Entregado</button>
          </div>
        </form>
      </th>
      </tr>
      <?php
    }
  }
}

#Esta funcion nos devuelve todos los productos que se realizaron con una ompra
public static function getProductosCompras($compras){
  if (count($compras)) {
    $total = 0;
    for ($i=0; $i <count($compras); $i++) {
      $compra_actual = $compras[$i][0];
      $cantidad = $compras[$i][1];
      $total = $total + $compra_actual -> getPrecioProducto();
      ?>
    <tr>
      <th><?php echo $compra_actual -> getNombreProducto();?></th>
      <th><?php echo $cantidad;?></th>
      <th>$<?php echo $compra_actual -> getPrecioProducto();?> MXN</th>
      <th><?php echo $compra_actual -> getCodigoInterno();?></th>
    </tr>
      <?php
    }
    ?>
    <tr>
      <th>Total</th>
      <th></th>
      <th>$<?php echo $total;?> MXN</th>
    </tr>
    <?php
  }
}

#con esta funcion se llenan las categorias de los productos en un option
public static function setCategorias($categorias){
  if (count($categorias)) {
    for ($i=0; $i <count($categorias); $i++) {
      $categoria_actual = $categorias[$i][0];
      ?>
      <option value="<?php echo $categoria_actual -> getIdCategoria();?>"><?php echo $categoria_actual -> getNombreCategoria();?></option>
      <?php
    }
  }
}


#Con esta funcion recuperamos e imprimimos los productos de la base para poder modificarlos
public static function setProductos($productos){
  if (count($productos)) {
    for ($i=0; $i < count($productos); $i++) {
      $producto_actual = $productos[$i];
      ?>
      <tr>
        <th>
          <form role="form" action="<?php echo RUTA_INVENTARIO?>" method="post">
          <div class="form-group">
            <label><?php echo $producto_actual -> getIdPropducto();?></label>
            <input type="hidden" name="id_producto" value="<?php echo $producto_actual -> getIdPropducto();?>">
          </div>
        </th>
        <th>
          <div class="form-group">
            <label><?php echo $producto_actual -> getNombreProducto();?></label>
          </div>
        </th>
        <th>
          <div class="form-group">
            <label><?php echo $producto_actual -> getDescripcionProducto();?></label>
          </div>
        </th>
        <th>
          <div class="form-group">
           <label>Actual: <?php echo $producto_actual -> getPrecioProducto();?></label>
           <input type="text" name="precio">
          </div>
        </th>
        <th>
          <div class="form-group">
            <label> Actual: <?php echo $producto_actual -> getKeywordProducto();?></label>
            <input type="text" name="palabra">
          </div>
        </th>
        <th>
          <div class="form-group">
            <label>Actual: <?php echo $producto_actual -> getStock();?></label>
            <input type="text" name="stock">
          </div>
        </th>
        <th>
          <div class="form-group">
            <label><?php echo $producto_actual -> getCodigoInterno();?></label>
          </div>
        </th>
        <th>
          <div class="form-group">
            <button type="submit" name="editar" class="btn btn-primary">Editar</button>
          </div>
        </form>
        </th>
      </tr>
      <?php
    }
  }
}

#Con esta funcion mostramos las diferentes categorias existentes
public function setCategoriasPanel($categorias){
  if (count($categorias)) {
    for ($i=0; $i <count($categorias); $i++) {
     $categoria_actual = $categorias[$i][0];
     ?>
<tr>
  <th><?php echo $categoria_actual -> getNombreCategoria();?></th>
</tr>
     <?php
    }
  }
}

#Con esta funcion imprimimos los estados dentro de la base
public function setEstados($estados){
  if (count($estados)) {
    for ($i=0; $i < count($estados); $i++) {
      $estado_actual = $estados[$i][0];
      ?>
      <tr>
        <th><?php echo $estado_actual -> getIdEstado();?></th>
        <th><?php echo $estado_actual -> getNombreEstado();?></th>
      </tr>
      <?php
    }
  }
}
#con esta funcion imprimimos los estados en un opcion
public static function setEstadosOption($estados){
if (count($estados)) {
  for ($i=0; $i < count($estados); $i++) {
    $estado_actual = $estados[$i][0];
    ?>
<option value="<?php echo $estado_actual -> getIdEstado();?>"><?php echo $estado_actual -> getNombreEstado();?></option>
    <?php
  }
}
}

#Con esta funcion imprimimos los municipios y estados de la base
public static function setMunicipios($municipios){
  if (count($municipios)) {
    for ($i=0; $i < count($municipios); $i++) {
      $municipio_actual = $municipios[$i][0];
      $estado = $municipios[$i][1];
      ?>
<tr>
  <th><?php echo $estado;?></th>
  <th><?php echo $municipio_actual -> getNombreMunicipio();?></th>
</tr>
      <?php
    }
  }
}

#Con esta funcion mostramos los codigos postales de la base
public static function setCodigos($codigos){
  if (count($codigos)) {
    for ($i=0; $i < count($codigos); $i++) {
      $codigo_actual = $codigos[$i][0];
      $estado = $codigos[$i][1];
      ?>
<tr>
  <th><?php echo $estado;?></th>
  <th><?php echo $codigo_actual -> getCodigoPostal();?></th>
</tr>
      <?php
    }
  }
}

#con esta funcion imprimimos las promociones para el panel principal
public static function getPromociones($promociones){
if (count($promociones)) {
  for ($i=0; $i < count($promociones); $i++) {
    $promocion_actual = $promociones[$i][0];
    ?>
<tr>
  <th><?php echo $promocion_actual -> getNombrePromocion();?></th>
  <th><?php echo $promocion_actual -> getPorcentajePromocion();?>%</th>
</tr>
    <?php
  }
}
}

#con esta funcion se ingresan los productos en un select
public static function setProductosOption($productos){
  if (count($productos)) {
    for ($i=0; $i < count($productos); $i++) {
      $producto_actual = $productos[$i][0];
      ?>
      <option value="<?php echo $producto_actual -> getIdPropducto();?>"><?php echo $producto_actual -> getNombreProducto()." || ".$producto_actual -> getCodigoInterno();?></option>
      <?php
    }
  }
}

#Con esta funcion ponemos las promociones en un option
public static function setPromocionesOption($promociones){
  if (count($promociones)) {
    for ($i=0; $i < count($promociones); $i++){
      $promocion_actual = $promociones[$i][0];
      ?>
      <option value="<?php echo $promocion_actual -> getIdPromocion();?>"><?php echo $promocion_actual -> getNombrePromocion();?></option>
      <?php
    }
  }
}

#con esta funcion imprimimos los productos con promocion en una tabla
public static function setProductosConPromo($promociones_promo){
if (count($promociones_promo)) {
  for ($i=0; $i < count($promociones_promo); $i++) {
    $actual_promocion = $promociones_promo[$i][0];
    $actual_producto = $promociones_promo[$i][1];
    ?>
<tr>
  <th><?php echo $actual_producto -> getNombreProducto();?></th>
  <th><?php echo $actual_promocion -> getNombrePromocion();?></th>
  <th><?php echo $actual_promocion -> getPorcentajePromocion();?> %</th>
  <th><?php echo $actual_producto -> getCodigoInterno();?></th>
</tr>
    <?php
  }
}
}

#con esta funcion imprimimos los productos con promocion que se vana eliminar
public static function setProductosPromoDelete($productos){
  if (count($productos)) {
    for ($i=0; $i < count($productos); $i++) {
      $promocion_actual = $productos[$i][0];
      $producto_actual = $productos[$i][1];
      ?>
<tr>
  <th><?php echo $producto_actual -> getNombreProducto();?></th>
  <th><?php echo $producto_actual -> getCodigoInterno();?></th>
  <th><?php echo $promocion_actual -> getNombrePromocion();?></th>
  <th>
<form role="form" action="<?php echo RUTA_ELIMINAR_PROMO_PROD;?>" method="post">
<input type="hidden" name="producto" value="<?php echo $producto_actual -> getIdPropducto();?>">
<input type="hidden" name="promocion" value="<?php echo $promocion_actual -> getIdPromocion();?>">
<button type="submit" name="eliminar" class="btn btn-eliminar">Eliminar</button>
</form>
  </th>
</tr>
      <?php
    }
  }
}

public static function setEliminarPromos($promos){
  if (count($promos)) {
    for ($i=0; $i < count($promos); $i++) {
      $promo_actual = $promos[$i][0];
      ?>
      <tr>
        <th><?php echo $promo_actual -> getNombrePromocion();?></th>
        <th><?php echo $promo_actual -> getPorcentajePromocion();?></th>
        <th>
          <form role="form" action="<?php echo RUTA_ELIMINAR_PROMO;?>" method="post">
            <input type="hidden" name="id_promo" value="<?php echo $promo_actual -> getIdPromocion();?>">
            <button type="submit" name="eliminar" class="btn btn-eliminar">Eliminar</button>
          </form>
        </th>
      </tr>
      <?php
    }
  }
}

public static function escribirEventos($eventos){
if (count($eventos)) {
  for ($i=0; $i <count($eventos); $i++) {
    $evento_actual = $eventos[$i][0];
    $domicilio = $eventos[$i][1];
$participantes = RepoEvento::contarParticipantes(Conexion::getConexion(), $evento_actual -> getIdEvento());
?>
<tr>
  <th><?php echo $evento_actual -> getNombreEvento();?></th>
  <th><?php echo $evento_actual -> getFechaEvento();;?></th>
  <th><?php echo $domicilio;?></th>
  <th><?php echo $participantes;?></th>
</tr>
<?php
  }
}
}

public static function setEventosModify($eventos){
if (count($eventos)) {
  for ($i=0; $i < count($eventos); $i++) {
    $evento_actual = $eventos[$i][0];
    $domicilio = $eventos[$i][1];
    ?>
<tr>
  <th><?php echo $evento_actual -> getNombreEvento();?></th>
  <th><?php echo $domicilio;?></th>
  <?php
  if ($evento_actual -> getStatusEvento() == 1) {
    ?>
  <th><?php echo "Evento activo";?></th>
  <th>
<form role="form" action="<?php echo RUTA_CULMINAR_EVENTO;?>" method="post">
<div class="form-group">
<input type="hidden" name="evento" value="<?php echo $evento_actual -> getIdEvento();?>">
<button type="submit" name="culminar" class="form-control btn btn-primary">Culminar</button>
</div>
</form>
  </th>
    <?php
  }else {
  ?>
  <th><?php echo "Evento culminado";?></th>
  <?php
  }
  ?>

</tr>
    <?php
  }
}
}

}
 ?>
