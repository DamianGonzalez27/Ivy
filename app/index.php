<?php
ob_start();
//Incluimos las librerias que vamos a usar

use App\Configuraciones\Config;
/*Aqui manejamos las diferentes rutas en donde puede navegar el usuario
Descomponemos la url en el navegador para asi poder enviar los parametros por medio de constantes
estas rutas se encuentran en el archivo  /app/config.inc.php
*/
$componentes_url = parse_url($_SERVER['REQUEST_URI']);
//Asignamos los componentes de la ruta en un array
$ruta = $componentes_url['path'];
$partes_ruta = explode("/", $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

//Asignamos una variable estandar para manejar el flujo de datos
//Esta tiene el valor de la pagina con el error 404
$ruta_elegida = '../index.html';
//Valoramos las partes de la ruta para asi poder abir diferentes vistas

#Primera parte del enrutador
if (count($partes_ruta) == 3) {
  switch ($partes_ruta[2]) {
    case 'test':
      $ruta_elegida = "../vistas/test.html";
      break;
  }
}

include_once $ruta_elegida;
