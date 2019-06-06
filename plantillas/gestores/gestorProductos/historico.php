<?php
 ?>
<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Revisa los productos vendidos</h3>
  </div>
  <div class="panel-body">
    <table class="table table-responsive">
      <thead>
<tr>
  <th>Cliente</th>
  <th>Producto</th>
  <th>Domicilio</th>
  <th>Fecha de compra</th>
  <th>Opciones</th>
</tr>
      </thead>
      <tbody>
<?php Helper::setProductosHistorico($productos_facturados);?>
      </tbody>
    </table>
  </div>
</div>
