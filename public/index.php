<?php 
/**
 * @author Damian Gonzalez <damian.gonzalez@hamiltonandlovelace.com>
 * 
 * Este es el archivo que inicia la aplicación
 * 
 */

// Incluimos el autoload de composer
require_once "../vendor/autoload.php";

// Incluimos las librerías de inicio
include_once "../Bootstrap.php";

// Iniciamos la aplicación
$app = new \Core\Kernel;

// Ejecutamos la aplicación
$app->run();
