<?php
if (isset($_POST['eliminar'])) {
  $id_entrada = $_POST['id_entrada'];
  Conexion::abrirConexion();
  $eliminar_entrada = RepoEntradas::eliminarEntradas(Conexion::getConexion(), $id_entrada);
  if ($eliminar_entrada) {
    unlink(DIRECTORIO_RAIZ."/blog_imagenes/".$id_entrada."jpg");
    Redireccion::redirigir(RUTA_PANEL_ENTRADA);
  }
}
 ?>
<div class="panel panel-default panelPrincipal">
  <div class="panel-heading">
    <h1 class="panel-title text-center"><i class="fa fa-file" aria-hidden="true"></i> Mis entradas</h1>
  </div>
  <div class="panel-body">
<?php
if (count($entradas)) {
  ?>
  <table class="table table-responsive">
    <thead>
      <tr>
        <th><i class="fa fa-calendar" aria-hidden="true"></i> Fecha</th>
        <th><i class="fa fa-flag" aria-hidden="true"></i> Titulo</th>
        <th><i class="fa fa-comment" aria-hidden="true"></i> Autor</th>
        <th colspan="2"><i class="fa fa-plus" aria-hidden="true"></i> Mas</th>
      </tr>
    </thead>
    <tbody>
<?php EscritorEntradas::setEntradasPanel($entradas);?>
    </tbody>
  </table>
  <?php
}else {
  ?>
  <h1>No se han encontrado entradas</h1>
  <?php
}
 ?>
  </div>
</div>
