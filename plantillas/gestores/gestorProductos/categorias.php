<?php
if (isset($_POST['insertar'])) {
  $categoria = $_POST['categoria'];
  Conexion::abrirConexion();
  $categoria_insertada = RepoProductos::insertarCategoria(Conexion::getConexion(), $categoria);
  Conexion::cerrarConexion();
  if ($categoria_insertada) {
    Redireccion::redirigir(RUTA_CATEGORIAS);
  }
}
 ?>
<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title">Categorias de productos</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Categorias existentes</h3>
          </div>
          <div class="panel-body">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Categorias</th>
                </tr>
              </thead>
              <tbody>
<?php Helper::setCategoriasPanel($categorias)?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Ingresar categorias</h3>
          </div>
          <div class="panel-body">
<form action="<?php echo RUTA_CATEGORIAS;?>" method="post">
<div class="form-group">
<label>Ingresa una nueva categoria</label>
<input type="text" name="categoria">
</div>
<div class="form-group">
<button type="submit" name="insertar" class="btn btn-primary">Ingresar</button>
</div>
</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
