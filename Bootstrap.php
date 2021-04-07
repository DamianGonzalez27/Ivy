<?php 
/**
 * @author DamianDev <damian27goa@gmail.com>
 * 
 * Este archivo carga las librerias necesarias para cargar variables de entorno dentro de la aplicacion
 * y la libreria de visualizacion de errores
 */
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS')
{
    die();
}

// Carga de la libreria para leer los archivos .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Carga de la libreria Woops para el debug de errores
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

include_once 'doctrine-config.php';