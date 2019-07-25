<?php
ob_start();
//Incluimos las librerias que vamos a usar
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoUsuario.php';
include_once 'app/repos/repoEntradas.php';
include_once 'app/repos/repoProductos.php';
include_once 'app/repos/repoPromociones.php';
include_once 'app/repos/repoCarrito.php';
include_once 'app/repos/repoEvento.php';
include_once 'app/repos/repoDomicilio.php';
include_once 'app/repos/repoCompras.php';
include_once 'app/controlSesion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/redireccion.inc.php';
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
$ruta_elegida = 'vistas/404.php';
//Valoramos las partes de la ruta para asi poder abir diferentes vistas

#Primera parte del enrutador
if ($partes_ruta[0] == 'ivyframe'){
  if (count($partes_ruta) == 1) {
    $gestor_actual = "";
    $ruta_elegida = "vistas/home.php";
  #Aqui definimos la segunda parte de la ruta
  }else if (count($partes_ruta) == 2){
      switch($partes_ruta[1]){
          //Ruta publica del blog
          #No requiere proteccion
                case 'blog':

                  break;
          //Ruta de la tienda en linea
          #La vista no requiere proteccion
                case 'tienda':
                $gestor_actual = '';
                $ruta_elegida = "vistas/tienda.php";
                  break;
          //Ruta de la seccion de promocion de eventos
          #No requiere proteccion
                case 'evento':
                $gestor_actual = '';
                $ruta_elegida = 'vistas/evento.php';
                  break;
          //Ruta del medio de contacto por email
          #No requiere proteccion
               case 'contacto':
               $ruta_elegida = "vistas/contacto.php";
                 break;
            //Ruta del aviso de privacidad
            #No requiere proteccion
               case 'privacidad':
               $ruta_elegida = "vistas/privacidad.php";
                 break;
            //Ruta de inicio de sesion de usuarios
            #No requiere de proteccion
            
      }
  }
}

include_once $ruta_elegida;
?>
