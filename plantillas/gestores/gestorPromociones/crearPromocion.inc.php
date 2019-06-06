<?php
include_once 'app/objetos/promociones.php';
include_once 'app/repos/repoPromociones.php';

if (isset($_POST['ingresar'])) {
  $promocion = new Promociones('',
$_POST['nombre_promo'],
$_POST['porcentaje']
  );
Conexion::abrirConexion();
  $insertar_promo = RepoPromociones::insertarPromociones(Conexion::getConexion(), $promocion);
if ($insertar_promo) {
  Redireccion::redirigir(RUTA_GESTOR_PROMOCIONES);
}
}
 ?>

<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Ingresa una promocion</h3>
  </div>
  <div class="panel-body">
<form roles="form" action="<?php echo RUTA_NUEVA_PROMO;?>" method="post">
<div class="form-group">
<label>Ingresa el nombre de la promocion</label>
<input type="text" name="nombre_promo">
</div>
<div class="form-group">
<label>Ingresa el porcentaje de descuento</label>
<input type="text" name="porcentaje">
</div>
<div class="form-group">
<button type="submit" name="ingresar" class="btn btn-primary">Ingresar</button>
</div>
</form>
  </div>
</div>
