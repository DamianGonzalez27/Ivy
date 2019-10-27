<?php

require __DIR__.'/vendor/autoload.php';

use Core\Kernel as Kernel;
use Controladores\Kernel as Controlador;
use Modelos\Kernel as Modelo;
use Servicios\Kernel as Servicio;

$kernel = new Kernel;
//print('test');
$controlador = new Controlador;
//print('test');
$modelo = new Modelo;
//print('test');
$servicio = new Servicio;
//print('test');

$a = $kernel->test();
$b = $controlador->test();
$c = $modelo->test();
$d = $servicio->test();

$response = array(
    'kernel' => $a,
    'controlador' => $b,
    'modelo' => $c,
    'servicio' => $d
);

echo "<pre>";
print_r($response);




