<?php
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/repos/repoUsuario.php';
include_once 'app/repos/repoDomicilio.php';
include_once 'app/repos/repoCompras.php';
include_once 'app/conexion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/escritores/escritorUser.inc.php';

Conexion::abrirConexion();
if (isset($_POST['eliminar'])) {
  $id_domicilio = $_POST['id_domicilio'];
  $eliminar = RepoDomicilio::eliminarDomicilioById(Conexion::getConexion(), $id_domicilio);
  if ($eliminar) {
    Redireccion::redirigir(RUTA_USER."/".$_SESSION['id_usuario']);
  }
}
Conexion::cerrarConexion();
?>

       <div class="jumbotron text-center">
       <h1>¡¡Bienvenido!!!</h1>
       <h2><?php
echo $usuario -> getNombreUsuario();
        ?></h2>
       </div>

       <div class="perfil-usuario">
          <hr class="featurette-divider">
       <div class="row">
<!-- Panel de pedidos-->
<div class="col-md-4">
  <div class="row control-panel">
    <div class="col-md-4">
<img src="<?php echo RUTA_IMAGENES;?>/imagenes/pedidos.png" alt="Pedidos">
       </div>
    <?php EscritorUser::panelPedidos($pedidos);?>
  </div>
</div>
<!-- Panel de pedidos-->

<!-- Panel de facturacion-->
<div class="col-md-4">
  <div class="row control-panel">
    <div class="col-md-4">
<img src="<?php echo RUTA_IMAGENES;?>/imagenes/pagos.png" alt="Pedidos">
       </div>
    <?php EscritorUser::panelFacturas($factura);?>
  </div>
</div>
<!-- Panel de facturacion-->

<!-- Panel de los eventos comprados y subscritos -->
<div class="col-md-4">
<div class="row control-panel">
  <div class="col-md-4">
    <img src="<?php echo RUTA_IMAGENES;?>/imagenes/evento.png" alt="Pedidos">
  </div>
  <div class="col-md-8">
<?php EscritorUser::panelEventos($eventos);?>
  </div>
</div>
</div>
<!-- Panel de los eventos comprados y subscritos -->
 </div>
<hr class="featurette-divider">
  <div class="row">
  <!-- Panel de domicilio-->
  <div class="col-md-12">
    <div class="row control-panel">
      <div class="col-md-4">
<img src="<?php echo RUTA_IMAGENES;?>/imagenes/domicilio.png" alt="Domicilio">
      </div>
      <div class="col-md-8">
<?php //EscritorUser::panelDomicilio($domicilio);?>
      </div>
    </div>
  </div>
  <!-- Panel de domicilio-->
  </div>
</div>
 <?php
  include_once 'plantillas/cierre.inc.php';
  ?>
