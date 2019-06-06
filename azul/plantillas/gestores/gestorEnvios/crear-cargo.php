<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Crear cargo</h3>
  </div>
  <div class="panel-body">
<form role="form" action="index.html" method="post">
<div class="form-group">
  <label>Nombre del cargo</label>
  <input type="text" name="nombre" class="form-control">
</div>
<div class="form-group">
  <label>Cargo</label>
  <input type="number" name="cargo" class="form-control">
</div>
<div class="form-group">
  <label>Selecciona el estado para aplicar el cargo</label>
  <select class="form-control" name="estado">
    <?php Helper::setEstadosOption($estados);?>
  </select>
</div>
<div class="form-group">
<button type="submit" name="crear" class="form-control btn btn-primary">Crear</button>
</div>
</form>
  </div>
</div>
