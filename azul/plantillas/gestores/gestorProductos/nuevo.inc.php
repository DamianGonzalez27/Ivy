<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/objetos/productos.php';
include_once 'app/validadores/validadorProducto.inc.php';
include_once 'app/repos/repoProductos.php';

if (isset($_POST['guardar']) && !empty($_FILES['archivo_subido']['tmp_name'])) {
  Conexion::abrirConexion();
  $url = $_POST['nombre'];
  $validador = new ValidadorProducto(
    $_POST['nombre'],
    $_POST['descripcion'],
    $_POST['precio'],
    $_POST['keyword'],
    $url
  );
  if ($validador -> productoValidado()) {
    $producto = new Producto('',
                            $validador -> getNombre(),
                            $validador -> getDescripcion(),
                            $validador -> getPrecio(),
                            $validador -> getKeyword(),
                            $_POST['categoria'],
                            $validador -> getUrlEntrada(),
                            $_POST['stock'],
                            $_POST['codigo_interno']

    );
  $producto_insertado = RepoProductos::insertarProducto(Conexion::getConexion(), $producto);
    if ($producto_insertado) {
      //Aqui realizamos el proseso para subir una imagen al servidor
      $last_id = RepoProductos::getLastId(Conexion::getConexion());
      $directorio = DIRECTORIO_RAIZ."/productos/";
      $objetivo = $directorio.basename($_FILES['archivo_subido']['name']);
      $tipo_imagen = pathinfo($objetivo, PATHINFO_EXTENSION);
      $tamaño_imagen = getimagesize($_FILES['archivo_subido']['tmp_name']);


  if(move_uploaded_file($_FILES['archivo_subido']['tmp_name'], DIRECTORIO_RAIZ."/productos/".$last_id.".jpg")){
          echo "El archivo se subio correctamente";
      }
      Redireccion::redirigir(RUTA_GESTOR_PRODUCTOS);
    }
  }
}
Conexion::cerrarConexion();
 ?>

<div class="panelPrincipal">

<div class="panelNuevoProducto">
  <form role="form" method="POST" action="<?php echo RUTA_PRODUCTOS_NUEVO;?>" enctype="multipart/form-data">
    <?php
    if (isset($_POST['guardar'])) {
      include_once 'plantillas/gestores/gestorProductos/nuevoProductoValidado.inc.php';
    }else {
      include_once 'plantillas/gestores/gestorProductos/nuevoProductoVacio.inc.php';
    }
     ?>
</div>

</div>
