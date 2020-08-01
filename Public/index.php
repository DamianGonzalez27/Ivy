<?php 
/**
 * @author DamianDev <damian27goa@gmail.com>
 * 
 * Este es el archivo que inicia la aplicacion
 * 
 */
// Incluimos el autoload de composer
require_once "../vendor/autoload.php";

// Incluimos las librerias de inicio
include_once "../Packages/Charger.php";

// Iniciamos la aplicacion
$app = new \Core\Kernel;

// Ejecutamos la aplicacion
$app->run();
