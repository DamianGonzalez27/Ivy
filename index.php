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
/**
 * @author DamianDev
 * 
 * IvyFrame
 * Framework PHP OpenSource
 * 
 */



//Carga de la clase 'Autoload' de Composer
require __DIR__.'/vendor/autoload.php';


/**
 * 
 * Modulo de carga de kernel
 * 
 */

//Carga del core de funcionalidad del Framework
$app = new Clarity\Kernel;




/**
 * 
 * Metodo de inicio y arranque de la aplicacion
 * 
 */

//Ejecucion de la aplicacion
$app->run();















