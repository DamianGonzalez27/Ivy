<?php 
/**
 * @author DamianDev <damian27goa@gmail.com>
 * 
 * Este archivo carga las librerias necesarias para cargar variables de entorno dentro de la aplicacion
 * y la libreria de visualizacion de errores
 */

// Carga de la libreria para leer los archivos .env
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

// Carga de las configuraciones para eloquent
include_once __DIR__.'/Config/database.php';

// Carga de eloquent
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection($eloquentConfig);
$capsule->bootEloquent();

// Carga de la libreria Woops para el debug de errores
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
