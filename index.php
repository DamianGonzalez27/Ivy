<?php

/**
* @author Damian Gonzalez
* @since 08/2019
* En este archivo se encuentra inicializado toda la logica para comenzar con el framework
*
*/

include_once "Framework/kernel.php";

$app = new init;

$app -> start();