<div class="jumbotron text-center">
  <h1>Verifica tu correo</h1>
  <p><?php echo $usuario;?></p>
</div>

<div class="row separador">
<div class="col-md-4">

</div>
<div class="col-md-4">
<form role="form" action="<?php echo RUTA_ACTIVACION."/".$url;?>" method="post">
<div class="form-group">
<label>Valida tu correo</label>
<input type="hidden" name="usuario" value="<?php echo $usuario;?>">
<button type="submit" name="validar" class="form-control btn btn-primary">Validar</button>
</div>
</form>
</div>
</div>
