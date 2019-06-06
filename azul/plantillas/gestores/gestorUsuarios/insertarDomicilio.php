<?php
include_once 'app/objetos/domicilio.php';
include_once 'app/repos/repoDomicilio.php';
include_once 'app/redireccion.inc.php';
include_once 'app/conexion.inc.php';
Conexion::abrirConexion();

if (isset($_POST['registrar'])) {
  $Domicilio = new Domicilio(
    '',
    $estado = $_POST['estado'],
    $cp = $_POST['codigo_postal'],
    $muni = $_POST['municipio'],
    $colonia = $_POST['colonia'],
    $interior = $_POST['no_interior'],
    $exterior = $_POST['no_exterior'],
    $localidad = $_POST['localidad'],
    $calle = $_POST['calle'],
    $referencia = $_POST['observaciones'],
    $id_usuario = $_POST['id_usuario']
  );

  $domicilio_insertado = RepoDomicilio::insertarDomicilioUsuario(Conexion::getConexion(), $Domicilio);
  if ($domicilio_insertado) {
    Redireccion::redirigir(RUTA_USER.'/'.$id_usuario);
  }else {
    // code...
  }

}
Conexion::cerrarConexion();
 ?>
