<?php
class EscritorUser{

public static function panelPedidos($pedidos){
  if(count($pedidos)){
    ?>
        <div class="col-md-8">
          <h1 class="panel-title text-center">Pedidos <span class="circulo"><?php echo count($pedidos);?></span> </h1>
          <a href="<?php echo RUTA_PEDIDOS;?>" class="btn btn-default" type="button">Revisar pedidos</a>
        </div>

    <?php
  }else {
?>
    <div class="col-md-8">
      <h1 class="panel-title text-center">Pedidos</h1>
      <a href="<?php echo RUTA_PEDIDOS;?>" class="btn btn-default" type="button">Revisar pedidos</a>
    </div>
<?php
  }
}

public static function panelFacturas($facturas){
if (count($facturas)) {
  ?>
      <div class="col-md-8">
        <h1 class="panel-title text-center fuente-label">Facturacion y compras <span class="circulo"><?php echo count($facturas);?></span></h1>
        <a href="<?php echo RUTA_FACTURACION;?>" class="btn btn-primary" type="button">Revisar historial</a>
      </div>
  <?php
}else {
  ?>

      <div class="col-md-8">
        <h1 class="panel-title text-center fuente-label">Facturacion y compras</h1>
        <a href="<?php echo RUTA_FACTURACION;?>" class="btn btn-primary" type="button">Revisar historial</a>
      </div>
  <?php
}
}

public static function panelDomicilio($domicilio){
  if (count($domicilio)){
    ?>
  <table class="table table-responsive">
    <thead>
      <tr>
        <th>Domicilio</th>
        <th>Estado</th>
        <th>Codigo postal</th>
        <th>Referencias</th>
      </tr>
    </thead>
<tbody>
    <?php
for ($i=0; $i <count($domicilio); $i++) {
 $domicilio_actual = $domicilio[$i][0];
 $estado = $domicilio[$i][1];
 $municipio = $domicilio[$i][2];
 $codigo = $domicilio[$i][3];
 ?>
<tr>
  <th><?php echo $domicilio_actual -> getCalle()."\n".$domicilio_actual -> getColonia();?></th>
  <th><?php echo $estado;?></th>
  <th><?php echo $codigo;?></th>
  <th><?php echo $domicilio_actual -> getReferencias();?></th>
</tr>
 <?php
}
    ?>
    </tbody>
  </table>
<a href="<?php echo RUTA_NUEVO_DOMICILIO;?>" class="btn btn-default" type="button">Ingresar nuevo</a>

    <?php
  }else {
    ?>
<a href="<?php echo RUTA_NUEVO_DOMICILIO;?>" class="btn btn-domicilio" type="button">Ingresar nuevo</a>
    <?php
  }
}

public static function panelEventos($eventos){
  if (count($eventos)) {
    ?>
      <h1 class="panel-title text-center label-test">Revisa tus registros de eventos <span class="circulo"><?php echo count($eventos);?></span></h1>
      <a href="<?php echo RUTA_REGISTROEVENTOS;?>" class="btn btn-default" type="button">Revisar eventos</a>
    <?php
  }else {
    ?>
      <h1 class="panel-title text-center label-test">Revisa tus registros de eventos</h1>
      <a href="<?php echo RUTA_REGISTROEVENTOS;?>" class="btn btn-default label-test" type="button">Revisar eventos</a>
    <?php
  }
}



}
 ?>
