<?php
$titulo = $entrada -> getTitulo();
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/repos/repoEntradas.php';
include_once 'app/conexion.inc.php';

 ?>
<div class="titulo-entrada" style="background-image:url(<?php echo RUTA_IMAGENES_BLOG.$entrada -> getIdEntrada();?>.jpg)">
<div class="cuerpo-titulo-entrada">
  <h1>
    <?php
    echo $entrada -> getTitulo();
     ?>
  </h1>
  <h2>
    By:
    <?php
    echo $entrada -> getNombre();
    echo " ";
    echo $entrada -> getApellido();
     ?>
  </h2>
  <h3>Publicado el:</h3>
  <h4>
    <?php
  echo $entrada -> getFecha();
     ?>
  </h4>
</div>
</div>

<div class="row blog">
  <div class="panel panel-default">
    <div class="panel-body">
<h1><?php echo $entrada -> getTitulo();?></h1>
   <hr class="featurette-divider">
<p class="text-justify">
  <?php
echo $entrada -> getCuerpo();
   ?>
</p>
<div class="comentario">
<div class="fb-comments" data-href="<?php echo RUTA_ENTRADA.'/'.$entrada -> getUrl();?>" data-width="100%" data-numposts="5"></div>
</div>
    </div>
  </div>
</div>





<?php
include_once 'plantillas/cierre.inc.php';
 ?>
