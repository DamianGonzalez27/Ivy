<?php
include_once 'app/escritores/escritosHelper.inc.php';
 ?>

<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Gestiona promociones</h3>
  </div>
  <div class="panel-body">
<table class="table table-responsive">
  <thead>
    <tr>
      <th>Promocion</th>
      <th>Descuento de promocion</th>
    </tr>
  </thead>
  <tbody>
  <?php Helper::getPromociones($promociones);?>
  </tbody>
</table>
  </div>
</div>
