<?php

/**
 * @Author DamianDev
 * @Scince 2019
 * @Email ing.gonzaleza@outlook.com 
 * 
 * IvyFrame es un proyecto opensource con la finalidad de crear una herramienta que permita a los desarroladores
 * crear aplicaciones escalables
 * 
 */

//Carga de la clase 'Autoload' de Composer
require __DIR__.'/vendor/autoload.php';

//header('Access-Control-Allow-Origin: *');

//Carga del core de funcionalidad del Framework
$app = new Core\Kernel;

//Ejecucion de la aplicacion
$app->run();















