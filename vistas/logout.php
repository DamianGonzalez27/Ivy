<?php
include_once 'app/config.inc.php';
include_once 'app/controlSesion.inc.php';
include_once 'app/redireccion.inc.php';
ControlSesion::CerrarSesion();
Redireccion::redirigir(SERVIDOR);
 ?>
