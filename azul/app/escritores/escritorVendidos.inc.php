<?php

class HelperVendidos{

  public static function panelVendidos($ventas){
    if (count($ventas)) {
      ?>
      <h1 class="text-center"><i class="fa fa-check" aria-hidden="true"></i></h1>
      <br>
      <p>Productos vendidos <span class="circulo"><?php echo count($ventas);?></span></p>
      <p></p>
      <p><a class="btn btn-primary" href="<?php echo RUTA_VENDIDOS;?>">Ver más</a></p>
      <?php
    }else {
      ?>
      <h1 class="text-center"><i class="fa fa-check" aria-hidden="true"></i></h1>
      <br>
      <p>Productos vendidos</p>
      <p></p>
      <p><a class="btn btn-primary" href="<?php echo RUTA_VENDIDOS;?>">Ver más</a></p>
      <?php
    }
  }

  public static function panelEnviados($envios){
    if (count($envios)) {
      ?>
      <h1 class="text-center"><i class="fa fa-calendar" aria-hidden="true"></i></h1>
      <br>
      <p>Productos enviados <span class="circulo"><?php echo count($envios);?></span></p>
      <p></p>
      <p><a class="btn btn-primary" href="<?php echo RUTA_ENVIADOS;?>">Ver más</a></p>
      <?php
    }else {
      ?>
      <h1 class="text-center"><i class="fa fa-calendar" aria-hidden="true"></i></h1>
      <br>
      <p>Productos enviados</p>
      <p></p>
      <p><a class="btn btn-primary" href="<?php echo RUTA_ENVIADOS;?>">Ver más</a></p>
      <?php
    }
  }

  public function panelFacturas($facturas){
    if (count($facturas)) {
      ?>
      <h1 class="text-center"><i class="fa fa-file" aria-hidden="true"></i></h1>
      <br>
      <p>Solicitudes de factura <span class="circulo"><?php echo count($facturas);?></span></p>
      <p></p>
      <p><a class="btn btn-primary" href="<?php echo RUTA_FACTURAS?>">Ver más</a></p>
      <?php
    }else {
      ?>
      <h1 class="text-center"><i class="fa fa-file" aria-hidden="true"></i></h1>
      <br>
      <p>Solicitudes de factura</p>
      <p></p>
      <p><a class="btn btn-primary" href="<?php echo RUTA_FACTURAS?>">Ver más</a></p>
      <?php
    }
  }


}
 ?>
