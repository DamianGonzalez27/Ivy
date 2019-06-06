<?php
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoCarrito.php';
include_once 'app/repos/repoDomicilio.php';
include_once 'app/repos/repoProductos.php';
include_once 'app/redireccion.inc.php';
include_once 'app/repos/repoCompras.php';
include_once 'app/objetos/compras.php';
include_once 'app/escritores/escritosHelper.inc.php';

?>
<div class="jumbotron">
  <h1 class="text-center">Revisa tus proximos eventos</h1>
</div>
<div class="row separador">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title text-center">Proximos eventos</h1>
    </div>
    <div class="panel-body">
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>Nombre del evento</th>
            <th>Lugar del evento</th>
            <th>Fecha del evento</th>
          </tr>
        </thead>
        <tbody>
<?php Helper::mostrarEventos($eventos);?>
        </tbody>
      </table>
    </div>
  </div>
</div>
 <?php
include_once 'plantillas/cierre.inc.php';
  ?>
