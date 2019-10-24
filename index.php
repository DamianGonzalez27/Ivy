<?php
namespace Core\Home;

use Core\Rutas\Kernel as Kernel;


$app = Kernel::class;

$ruta_server = $_SERVER['REQUEST_URI'];

//$resultado = $app::traerArrayDeRutas();
$app::getRutas()


echo "<pre>";
print_r();


