<?php
include_once 'app/repos/repoCompras.php';
include_once 'app/repos/repoEvento.php';
include_once 'app/conexion.inc.php';
include_once 'app/escritores/escritorVendidos.inc.php';
 ?>
<div class="panelPrincipal">
  <div class="sub-panel">
<?php HelperVendidos::panelVendidos($ventas);?>
  </div>
  <div class="sub-panel">
<?php  HelperVendidos::panelEnviados($envios);?>
  </div>
  <div class="sub-panel">
<?php  HelperVendidos::panelFacturas($facturas);?>
  </div>
  <div class="sub-panel">
    <h1 class="text-center"><i class="fa fa-history" aria-hidden="true"></i></h1>
    <br>
    <p>Revisar historial de compras</p>
    <p></p>
    <p><a class="btn btn-primary" href="<?php echo RUTA_HISTORICO?>">Ver más</a></p>
  </div>
</div>
