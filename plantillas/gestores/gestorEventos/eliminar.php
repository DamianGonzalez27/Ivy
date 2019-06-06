<?php

if (isset($_POST['culminar'])) {
$id_evento = $_POST['evento'];
Conexion::abrirConexion();
$insertado = RepoEvento::culminarEvento(Conexion::getConexion(), $id_evento);
Conexion::cerrarConexion();
if ($insertado) {
  Redireccion::redirigir(RUTA_CULMINAR_EVENTO);
}
}

 ?>

<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Culminar evento</h3>
  </div>
  <div class="panel-body">
<table class="table table-responsive">
  <thead>
<tr>
  <th>Evento</th>
  <th>Domicilio</th>
  <th>Status Evento</th>
  <th>Opciones</th>
</tr>
  </thead>
  <tbody>
<?php Helper::setEventosModify($evento);?>
  </tbody>
</table>
  </div>
</div>
