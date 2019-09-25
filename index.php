<?php

/**
* @author Damian Gonzalez
* @since 08/2019
* En este archivo se encuentra inicializado toda la logica para comenzar con el framework
*
*/
$componentes_url = parse_url($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

include_once "Framework/init.php";


if ($partes_ruta[0] == "ivyframe.test")
{

    $app = new init;
    $app->start();



}

function funcionTest()
{
  return "test";
}
