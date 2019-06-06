<?php
include_once 'app/validadores/validadorEventos.php';
include_once 'app/objetos/evento.php';
include_once 'app/repos/repoEvento.php';
include_once 'app/escritores/escritosHelper.inc.php';

if (isset($_POST['registrar'])) {
$nombre = $_POST['nombre_evento'];
$precio = $_POST['precio_evento'];
$fecha = $_POST['fecha_evento'];
$domicilio = $_POST['envios'];

$validador = new ValidadorEventos($nombre, $precio);
if ($validador -> eventoValidado()) {
  $evento = new Evento('',
  $validador -> getNombre(),
  $validador -> getPrecio(),
  $fecha
);

Conexion::abrirConexion();
$insertar_evento = RepoEvento::insertarEventos(Conexion::getConexion(), $evento, $domicilio);
  if ($insertar_evento) {
    Redireccion::redirigir(RUTA_NUEVO_EVENTO);
  }
}

Conexion::cerrarConexion();
include_once 'plantillas/gestores/gestorEventos/form-validado.php';

}else {

include_once 'plantillas/gestores/gestorEventos/form-vacio.php';

}

 ?>
