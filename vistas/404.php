<?php
$titulo = 'Not Found';
header($_SERVER['SERVER_PROTOCOL']."404 Not Found", true, 404);
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';

 ?>

  <div class="jumbotron">
    <hgroup class="text-center">
      <h1>¡¡Oooops!!</h1>
      <h2>404 Not Found</h2>
    </hgroup>
  </div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 class="text-center panel-title">Al parecer la ruta no existe</h1>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
            <img id="imagen404" class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="<?php echo RUTA_IMAGENES;?>imagenes/404.png">
          </div>
          <div class="col-md-4">

          </div>
          <div class="col-md-12">
            <p class="text-center">No te preocupes puedes seguir navegando en el sitio</p>
            <a type="button" class="btn btn-primary form-control" href="<?php echo SERVIDOR?>">Regresar</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
