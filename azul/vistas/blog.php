<?php
$titulo = 'Azul Blog';
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/escritores/escritorEntradas.inc.php';
 ?>

  <div class="jumbotron">
    <h1 class="text-center">Blog Azul</h1>
  </div>
<div class="separador">
  <div class="row blog">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title text-center"><i class="fa fa-book" aria-hidden="true"></i> Ultimas entradas</h1>
        </div>
        <div class="panel-body">
<?php
EscritorEntradas::setEntradas($entradas);
 ?>
        </div>
      </div>
    </div>
  </div>

</div>
<?php
include_once 'plantillas/cierre.inc.php';
 ?>
