<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Nuevo Evento</h3>
  </div>
  <div class="panel-body">
    <form role="form" action="<?php echo RUTA_NUEVO_EVENTO;?>" method="post">
      <div class="form-group">
        <label>Ingresa el nombre del evento</label>
        <input type="text" name="nombre_evento" <?php echo $validador -> setErrorNombre();?>>
      </div>
      <div class="form-group">
        <label>Ingresa el precio del evento</label>
        <input type="number" name="precio_evento" <?php echo $validador -> setErrorPrecio();?>>
      </div>
      <div class="form-group">
        <label>Ingresa la fecha del evento</label>
        <input type="date" name="fecha_evento">
      </div>
      <div class="form-group">
        <label>Selecciona un domicilio para el evento</label>
<?php Helper::iterarDomicilioOnSelect($domicilio);?>
      </div>
      <div class="form-group">
        <button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
      </div>
    </form>
  </div>
</div>
