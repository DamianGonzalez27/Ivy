<?php
/*Incluimos las librerias que vamos a necesitar para escribir una entrada*/
include_once 'app/conexion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/objetos/entrada.php';
include_once 'app/validadores/validadorEntrada.php';
include_once 'app/repos/repoEntradas.php';
include_once 'app/redireccion.inc.php';

if (isset($_POST['publicar']) && !empty($_FILES['archivo_subido']['tmp_name'])) {
  Conexion::abrirConexion();
  $url = $_POST['titulo_entrada'];
  $validador = new ValidadorEntradas(
    $_POST['titulo_entrada'],
    $url,
    htmlspecialchars($_POST['cuerpo_entrada']),
    Conexion::getConexion()
  );
  if ($validador -> entradaValida()){
    $entrada = new Entrada('',
                         $_SESSION['id_usuario'],
                         $validador -> getTituloEntrada(),
                         $validador -> getUrlEntrada(),
                         $validador -> getCuerpoEntrada(),
                         ''
                         );
  $insertarEntrada = RepoEntradas::InsertarEntradas(Conexion::getConexion(), $entrada);

if ($insertarEntrada) {

$last_id = RepoEntradas::getLastId(Conexion::getConexion());
$directorio = DIRECTORIO_RAIZ."/blog_imagenes/";
$objetivo = $directorio.basename($_FILES['archivo_subido']['name']);
$tipo_imagen = pathinfo($objetivo, PATHINFO_EXTENSION);
$tamaño_imagen = getimagesize($_FILES['archivo_subido']['tmp_name']);

if (move_uploaded_file($_FILES['archivo_subido']['tmp_name'], DIRECTORIO_RAIZ."/blog_imagenes/".$last_id.".jpg")){
  echo "La entrada Se subio correctamente";
}
  Redireccion::redirigir(RUTA_GESTOR_BLOG);
}
}

}
Conexion::cerrarConexion();
 ?>


<div class="panel panelPrincipal">
  <div class="panel-heading">
    <h1 class="text-center panel-title"><i class="fa fa-pencil"></i> Redactar entrada</h1>
  </div>
  <div class="panel-body">
    <form role="form" method="POST" action="<?php echo RUTA_ESCRIBIR_ENTRADA;?>" enctype="multipart/form-data">
  <?php

    if (isset($_POST['publicar'])) {
      include_once 'plantillas/gestores/gestorBlog/escribirEntradaValidado.inc.php';
    }else {
      include_once 'plantillas/gestores/gestorBlog/escribirEntradaVacio.inc.php';
    }

   ?>
  </div>
</div>
