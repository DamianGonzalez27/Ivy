<?php
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/repos/repoUsuario.php';
include_once 'app/repos/repoProductos.php';
include_once 'app/repos/repoCarrito.php';
include_once 'app/repos/repoEvento.php';
include_once 'app/conexion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/controlSesion.inc.php';
include_once 'app/escritores/escritosHelper.inc.php';
/*Esta es la vista de los eventos*/
//Abrimos las conexiones y se crean los metodos con la interaccion con la base de datos
//Se agrega a la lista de compras el objeto de lox eventos
if (isset($_POST['comprar'])) {
Conexion::abrirConexion();
$id_usuario = $_SESSION['id_usuario'];
$id_evento = $_POST['id_evento'];
  $evento_insertato = RepoEvento::insertarEventoCarrito(Conexion::getConexion(), $id_usuario, $id_evento);
  if ($evento_insertato) {
  Redireccion::redirigir(RUTA_CARRITO);
  }
}
Conexion::cerrarConexion();
 ?>
<div class="jumbotron">
<h1 class="text-center">Eventos Azul</h1>
</div>
<div class="row separador">
<div class="col-md-4">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title text-center">Revisa el calendario de eventos</h1>
    </div>
    <div class="panel-body">
  <table class="table table-responsive">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Fecha</th>
        <th>Precio entrada</th>
      </tr>
    </thead>
    <tbody>
<?php Helper::insertarEventos($array_eventos);?>
    </tbody>
  </table>
    </div>
  </div>
</div>

<div class="col-md-8">
<div class="panel panel-default">
  <div class="panel-heading">
    <h1 class="text-center panel-title">Revisa nuestro ultimo video</h1>
  </div>
  <div class="panel-body transmicion">
<iframe src="https://www.youtube.com/embed/olCCgMuyOas" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  </div>
</div>
</div>
</div>
 <?php
 Conexion::cerrarConexion();
  include_once 'plantillas/cierre.inc.php';
  ?>
