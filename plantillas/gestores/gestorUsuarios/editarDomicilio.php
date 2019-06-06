<?php
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/repos/repoUsuario.php';
include_once 'app/repos/repoDomicilio.php';
include_once 'app/conexion.inc.php';
include_once 'app/objetos/domicilio.php';
include_once 'app/redireccion.inc.php';

 ?>

 <div class="jumbotron">
   <h1 class="text-center">Edita tu domicilio</h1>
 </div>

<div class="container-fluid">
  <form role="form" action="<?php echo RUTA_EDITAR_DOMICILIO;?>" method="post">
    <div class="form-group">
    <label>Nombre Completo</label>
    <input type="text" class="form-control" name="nombre_domicilio" placeholder="Juan Carlos Gonzalez" value="<?php //echo $domicilio -> getNombreDomicilio();?>">
    </div>
    <div class="form-group">
    <label>Direccion</label>
    <input type="text" class="form-control" name="direccion" placeholder="Barrio los pinos, no. 10" value="<?php //echo $domicilio -> getDirecion();?>">
    </div>
    <div class="form-group">
    <label>Codigo Postal</label>
    <input type="text" class="form-control" name="codigo" placeholder="52771" value="<?php //echo $domicilio -> getCodigoPostal();?>">
    </div>
    <div class="form-group">
    <label>Estado</label>
    <input type="text" class="form-control" name="estado" placeholder="Estado de México" value="<?php //echo $domicilio -> getEstado();?>">
    </div>
    <div class="form-group">
    <label>Ciudad</label>
    <input type="text" class="form-control" name="ciudad" placeholder="Ciudad de Toluca" value="<?php //echo $domicilio -> getCiudad();?>">
    </div>
    <div class="form-group">
    <label>Colonia</label>
    <input type="text" class="form-control" name="coloia" placeholder="Los pinos" value="<?php //echo $domicilio -> getColonia();?>">
    </div>
    <div class="form-group">
    <label>Telefono</label>
    <input type="text" class="form-control" name="telefono" placeholder="5555555555" value="<?php //echo $domicilio -> getTelefono();?>">
    </div>
     <br>
    <button type="submit" class="btn bt-default btn-primary" name="actualizar">Editar</button>
    <br>
    <br>
  </form>
</div>

<?php
  include_once 'plantillas/cierre.inc.php';
 ?>
