<?php
//Incluimos las librerias que vamos a usar
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoUsuario.php';
include_once 'app/repos/repoEntradas.php';
include_once 'app/repos/repoProductos.php';
include_once 'app/repos/repoPromociones.php';
include_once 'app/repos/repoCarrito.php';
include_once 'app/controlSesion.inc.php';
include_once 'app/config.inc.php';
/*Aqui manejamos las diferentes rutas en donde puede navegar el usuario
Descomponemos la url en el navegador para asi poder enviar los parametros por medio de constantes
estas rutas se encuentran en el archivo  /app/config.inc.php
*/
$componentes_url = parse_url($_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]);
//Asignamos los componentes de la ruta en un array
$ruta = $componentes_url['path'];
$partes_ruta = explode("/", $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);
//Asignamos una variable estandar para manejar el flujo de datos
//Esta tiene el valor de la pagina con el error 404
$ruta_elegida = 'vistas/404.php';
//Valoramos las partes de la ruta para asi poder abir diferentes vistas
//Estas son las vistas principales del software
#Primera parte del enrutador
if ($partes_ruta[0] == 'obelisktech.hol.es'){
  if (count($partes_ruta) == 1) {
    $ruta_elegida = "vistas/home.php";
  #Aqui definimos la segunda parte de la ruta
  }else if (count($partes_ruta) == 2) {
    #Realizamos los casos que se pueden usar en la segunda parte de la ruta
    switch ($partes_ruta[1]) {
//Ruta de la pagina de nosotros
#No requiere proteccion externa
      case 'nosotros':
      $ruta_elegida = "vistas/nosotros.php";
        break;
//Ruta publica del blog
#No requiere proteccion
      case 'blog':
      $gestor_actual = '';
      $ruta_elegida = "vistas/blog.php";
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
//Ruta de gestion del repoCarrito
#Requiere proteccion de visualizacion Solo usuarios pueden ver la vista
      case 'carrito':
#se realiza la comprobacion de session y se redirige a otra vista
      if (ControlSesion::sesionIniciada()) {
      $gestor_actual = '';#Se crea una variable para el uso posterior del gestor del carrito
      $ruta_elegida = 'vistas/carrito.php';
    }else {
      $ruta_elegida = 'vistas/home.php';
    }
        break;
//Ruta del medio de contacto por email
#No requiere proteccion
      case 'contacto':
      $ruta_elegida = "vistas/contacto.php";
        break;
//Ruta del registro a la pagina web
#No requiere proteccion
      case 'registro':
      $ruta_elegida = "vistas/registro.php";
      break;
//Ruta del gestor del blog de noticias
#Requiere de proteccion con rango de usuario nivel 5
      case 'gestor-blog':
      if (ControlSesion::sesionIniciada()) {
        $gestor_actual = '';#Se crea una variable para el uso posterior del gestor del carrito
        $ruta_elegida = "vistas/gestorBlog.php";
      }else {
        $ruta_elegida = "vistas/home.php";
      }
        break;
//Ruta del gestor de los productos
#Requiere de proteccion con rango de usuario nivel 5
      case 'gestor-productos':
        $gestor_actual = '';#Se crea una variable para el uso posterior del gestor del carrito
        $ruta_elegida = "vistas/gestorProductos.php";
        break;
//Ruta del gestor de gestorUsuarios
#Requiere de proteccion con rango de usuario nivel5
      case 'gestor-usuarios':
      if (ControlSesion::sesionIniciada()) {
        $gestor_actual = '';#Se crea una variable para el uso posterior del gestor del carrito
        $ruta_elegida = "vistas/gestorUsuarios.php";
      }else {
        $ruta_elegida = "vistas/home.php";
      }
        break;
//Ruta del aviso de privacidad
#No requiere proteccion
      case 'privacidad':
       $ruta_elegida = "vistas/privacidad.php";
       break;
//Ruta de inicio de sesion de usuarios
#No requiere de proteccion
      case 'login';
       $ruta_elegida = "vistas/login.php";
       break;
//Ruta de logout
#Requiere de proteccion de vista por usuario
      case 'logout':
        $ruta_elegida = "vistas/logout.php";
        break;
//Ruta de registro correcto
#Requiere de proteccion por vista
      case 'registro-correcto':
        $ruta_elegida = "plantillas/registroCorrecto.inc.php";
        break;
//Ruta para eliminar productos de la tienda
#REquiere de proteccion por usuario nivel 5
      case 'borrar-producto':
      if (ControlSesion::sesionIniciada()) {
        $ruta_elegida = "plantillas/borrarProducto.php";
      }else {
        $ruta_elegida = "vistas/hpme.php";
      }
        break;
//Ruta para agregar un domicilio de usuario
#Requiere de proteccion de vista por usuario
      case 'nuevo-domicilio':
      if (ControlSesion::sesionIniciada()) {
          $ruta_elegida = "plantillas/gestores/gestorUsuarios/nuevoDomicilio.php";
      }else {
        $ruta_elegida = "vistas/home.php";
      }
        break;
//Ruta para editar el domicilio $gestor_actual
#requiere de proteccion por usuario
      case 'editar-domicilio':
      if (ControlSesion::sesionIniciada()) {
        $ruta_elegida = "plantillas/gestores/gestorUsuarios/editarDomicilio.php";
      }else {
        $ruta_elegida = "vistas.home.php";
      }
        break;
//Ruta para gestionar el pago del usuario
#Requiere de proteccion de vista por usuario
      case 'pagar':
      if (ControlSesion::sesionIniciada()) {
        $ruta_elegida = "plantillas/gestores/gestorUsuarios/pagos.php";
      }else {
        $ruta_elegida = "vistas/home.php";
      }
       break;
//Ruta de la vista de compra de articulos
#Requiere de proteccion de vista por usuario
      case 'compra':
      if (ControlSesion::sesionIniciada()) {
        $ruta_elegida = "vistas/compra.php";
      }else {
        $ruta_elegida = "vistas/home.php";
      }
        break;
//Ruta que muestra los pedidos del usuarios
#Requiere proteccion de usuario por vista
      case 'pedidos':
      if (ControlSesion::sesionIniciada()) {
        $ruta_elegida = "plantillas/gestores/gestorUsuarios/pedidos.php";
      }else {
        $ruta_elegida = "vistas/home.php";
      }
        break;
//Ruta en donde se realizan las solicitudes de facturacion
#Se requiere de proteccion de usuario por vista
      case 'facturacion':
      if (ControlSesion::sesionIniciada()) {
        $ruta_elegida = "plantillas/gestores/gestorUsuarios/compras.php";
      }else {
        $ruta_elegida = "vistas/home.php";
      }
        break;
//Ruta del gestor de eventos
#Se requiere de proteccion por usuario nivel 5
      case 'registro-eventos':
        if (ControlSesion::sesionIniciada()){
        $ruta_elegida = "plantillas/gestores/gestorUsuarios/eventos.php";
      }else {
        $ruta_elegida = "vistas/home.php";
      }
        break;
    }
/*Creamos los gestores de administracion*/
#Gestor de la tienda(Vista publica)
  }else if(count($partes_ruta) == 3){
    if($partes_ruta[1] == 'tienda'){
      switch ($partes_ruta[2]) {
        case 'quimica-clinica':
        $gestor_actual = 'quimica-clinica';
        $ruta_elegida = 'vistas/tienda.php';
          break;
        case 'microbiologia':
        $gestor_actual = 'microbiologia';
        $ruta_elegida = 'vistas/tienda.php';
          break;
        case 'parasitlogia':
        $gestor_actual = 'parasitologia';
        $ruta_elegida = 'vistas/tienda.php';
          break;
        case 'hematologia':
        $gestor_actual = 'hematologia';
        $ruta_elegida = 'vistas/tienda.php';
          break;
        case 'serologia':
        $gestor_actual = 'serologia';
        $ruta_elegida = 'vistas/tienda.php';
          break;
        case 'equipos-laboratorio':
        $gestor_actual = 'equipos-laboratorio';
        $ruta_elegida = 'vistas/tienda.php';
          break;
        case 'consumibles':
        $gestor_actual = 'consumibles';
        $ruta_elegida = 'vistas/tienda.php';
          break;
        case 'resultado-busqueda':
        $ruta_elegida = 'vistas/tienda.php';
          break;
      }
    }
##Gestor del blog
    if ($partes_ruta[1] == 'gestor-blog') {
      if (ControlSesion::sesionIniciada()) {
        switch ($partes_ruta[2]) {
          case 'escribir-entrada':
          $gestor_actual = 'escribir-entrada';
          $ruta_elegida = "vistas/gestorBlog.php";
            break;
          case 'panel-entradas':
          $gestor_actual = 'panel-entradas';
          $ruta_elegida = 'vistas/gestorBlog.php';
            break;
          case 'borrar-entrada':
          $gestor_actual = "borrar-entrada";
          $ruta_elegida = 'vistas/gestorBlog.php';
            break;
        }
      }else {
        $ruta_elegida = "vistas/home.php";
      }
  }
#Gestor de productos
    if ($partes_ruta[1] == 'gestor-productos') {
    if (ControlSesion::sesionIniciada()) {
      switch ($partes_ruta[2]) {
        case 'nuevo':
        $gestor_actual = 'nuevo';
        $ruta_elegida = "vistas/gestorProductos.php";
          break;
        case 'inventario':
        $gestor_actual = 'inventario';
        $ruta_elegida = "vistas/gestorProductos.php";
          break;
        case 'borrar-producto':
        $gestor_actual = 'borrar-producto';
        $ruta_elegida = "vistas/gestorProductos.php";
          break;
      }
    }else {
      $ruta_elegida = "vistas/home.php";
    }
    }
    #Gestor de usuarios
    if ($partes_ruta[1] == 'gestor-usuarios') {
    if (ControlSesion::sesionIniciada()) {
      switch ($partes_ruta[2]) {
        case 'nuevo-usuario':
          $gestor_actual = '';
          $ruta_elegida = "vistas/gestorUsuarios.php";
          break;
      }
    }else {
      $ruta_elegida = "vistas/home.php";
    }
    }
    /*Creamos las vistas de productos o articulos especificos*/
    #Vista de las entradas del blog
    if ($partes_ruta[1] == 'entrada') {
    $url = $partes_ruta[2];
    Conexion::abrirConexion();
    $entrada = RepoEntradas::getEntradaByUrl(Conexion::getConexion(), $url);
    if ($entrada != null) {
    $autor = RepoUsuario::getUserById(Conexion::getConexion(), $entrada -> getIdUsuario());
    /*Aqui vamos a traer los comentarios y las entradas al azar*/
      $ruta_elegida = 'vistas/entrada.php';
    }
    Conexion::cerrarConexion();
    }
    #Vistas de los productos de la tienda
    if ($partes_ruta[1] == 'producto') {
    $url = $partes_ruta[2];
    Conexion::abrirConexion();
    $producto = RepoProductos::getProductosByUrl(Conexion::getConexion(), $url);
    $promocion = RepoPromociones::getPromocionById(Conexion::getConexion(), $producto -> getIdPropducto());
      if ($producto != null) {
    $ruta_elegida = "vistas/producto.php";
      }
Conexion::cerrarConexion();
    }
    #Vistas del perfil de usuario
    if ($partes_ruta[1] == 'usuario') {
      $gestor_actual = '';
      $url = $partes_ruta[2];
      Conexion::abrirConexion();
      $usuario = RepoUsuario::getUserById(Conexion::getConexion(),$url);
      if ($usuario != null) {
      $ruta_elegida = "vistas/user.php";
      }
    }
  }
}


include_once $ruta_elegida;



 ?>
