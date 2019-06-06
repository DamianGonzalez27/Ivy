<?php
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/conexion.inc.php';
Conexion::abrirConexion();
include_once 'app/repos/repoCarrito.php';
include_once 'app/repos/repoDomicilio.php';
include_once 'app/repos/repoCompras.php';
include_once 'app/repos/repoUsuario.php';
include_once 'app/objetos/compras.php';
include_once 'app/redireccion.inc.php';
include_once 'plantillas/gestores/gestorUsuarios/mail.php';

if (isset($_POST['pago'])) {
$domicilio = $_POST['domicilio'];
$id_usuario = $_POST['usuario'];
  $domicilio_actual = RepoDomicilio::getDomicilioById(Conexion::getConexion(), $domicilio);
  $usuario = RepoUsuario::getUserById(Conexion::getConexion(), $id_usuario);
  $array_carrito = RepoCarrito::getProductosCarrito(Conexion::getConexion(), $id_usuario);

/*Iteracion de la consulta*/
for ($i=0; $i < count($array_carrito); $i++) {
  $producto_actual = $array_carrito[$i][0];
  $cantidad_producto = $array_carrito[$i][1];
  /*Validacion de eventos*/
  if ($producto_actual -> getCategoriaProducto() == 9) {
    $compra = new Compras('',
    $id_usuario,
    '',
    $producto_actual -> getIdPropducto(),
    1,
    3,
    $cantidad_producto,
    $domicilio_actual -> getIdDomicilio()
  );

$enviar = mail('damian27goa@gmail.com', 'prueba', $primera_parte.$producto_actual -> getIdPropducto().$final,$cabeceras);

}else {
  $compra = new Compras('',
  $id_usuario,
  '',
  $producto_actual -> getIdPropducto(),
  1,
  1,
  $cantidad_producto,
  $domicilio_actual -> getIdDomicilio()
);
}

$insertar_compra = RepoCompra::insertarCompra(Conexion::getConexion(), $compra);
$eliminar_carrito = RepoCarrito::eliminarProductoCarrito(Conexion::getConexion(), $producto_actual -> getIdPropducto());
}
if ($insertar_compra) {
  Redireccion::redirigir(RUTA_USER.'/'.$_SESSION['id_usuario']);
}
}

$domicilio = $_POST['domicilio'];
$id_usuario = $_POST['usuario'];
$domicilio_actual = RepoDomicilio::getDomicilioById(Conexion::getConexion(), $domicilio);
$usuario = RepoUsuario::getUserById(Conexion::getConexion(), $id_usuario);
$array_carrito = RepoCarrito::getProductosCarrito(Conexion::getConexion(), $id_usuario);
Conexion::cerrarConexion();
 ?>
<div class="jumbotron">
  <h1 class="text-center">Realiza tu pago</h1>
</div>
  <div class="row separador">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title text-center">Datos de compra</h1>
        </div>
        <div class="panel-body">
          <div class="row">
          <div class="col-md-4 panel-datos-compra">
            <p>Datos de usuario</p>
            <ul>
              <li><?php echo $usuario -> getNombreUsuario();?></li>
              <li><?php echo $usuario -> getApellidoUsuario();?></li>
              <li><?php echo $usuario -> getCorreoUsuario();?></li>
              <li><?php echo $usuario -> getTelefonoUsuario();?></li>
            </ul>
          </div>
          <div class="col-md-4 panel-datos-compra">
            <p>Datos de pedido</p>
            <ul>
            <?php
            $resultado = 0;
      for ($i=0; $i < count($array_carrito) ; $i++) {
        $producto_actual = $array_carrito[$i][0];
        $cantidad_producto = $array_carrito[$i][1];
        $precio_productos = $cantidad_producto * $producto_actual -> getPrecioProducto();
        $resultado = $resultado + $precio_productos;
             ?>
      <li>Producto: <?php echo $producto_actual -> getNombreProducto();?></li>
      <li>Cantidad: <?php echo $cantidad_producto;?></li>
      <li>Precio: $<?php echo $producto_actual -> getPrecioProducto();?> MXN</li><br>
             <?php
           }
              ?>
            </ul>
          </div>
          <div class="col-md-4 panel-datos-compra">
            <p>Datos de domicilio</p>
            <ul>
              <li><?php echo $domicilio_actual -> getNombreDomicilio();?></li>
              <li><?php echo $domicilio_actual -> getDirecion();?></li>
              <li><?php echo $domicilio_actual -> getCodigoPostal();?></li>
              <li><?php echo $domicilio_actual -> getEstado();?></li>
              <li><?php echo $domicilio_actual -> getCiudad();?></li>
              <li><?php echo $domicilio_actual -> getColonia();?></li>
              <li><?php echo $domicilio_actual -> getTelefono();?></li>
            </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title text-center">Datos de la tarjeta</h1>
        </div>
        <div class="panel-body">
          <form role="form" action="<?php echo RUTA_PAGOS;?>" method="post">
              <div class="form-group">
                <label>Numero de tarjeta</label>
                <input type="text" name="numero">
              </div>
              <div class="form-group">
                <label>Fecha de vencimiento</label>
                <input type="date" name="fecha">
              </div>
              <div class="form-group">
                <label>Codigo de seguridad</label>
                <input type="text" name="seguridad">
              </div>
              <input type="hidden" name="domicilio" value="<?php echo $domicilio;?>">
              <input type="hidden" name="usuario" value="<?php echo $id_usuario;?>">
              <div class="form-group">
                <button class="btn btn-primary" type="submit" name="pago">Realizar pago</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
 include_once 'plantillas/cierre.inc.php';
   ?>
