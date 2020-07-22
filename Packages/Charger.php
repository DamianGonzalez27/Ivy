<?php 
/**
 * @author DamianDev <damian27goa@gmail.com>
 * 
 * Este archivo carga las librerias necesarias para cargar variables de entorno dentro de la aplicacion
 * y la libreria de visualizacion de errores
 */

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();