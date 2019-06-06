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
if ($partes_ruta[0] == 'azul'){
  if (count($partes_ruta) == 1) {
    $gestor_actual = "";
    $ruta_elegida = "vistas/tienda.php";
  #Aqui definimos la segunda parte de la ruta
  }else if (count($partes_ruta) == 2) {
    #Realizamos los casos que se pueden usar en la segunda parte de la ruta
    if (ControlSesion::sesionIniciada() && $_SESSION['acceso'] == 2) {
      switch ($partes_ruta[1]) {
          //Ruta publica del blog
          #No requiere proteccion
                case 'blog':
                Conexion::abrirConexion();
                $entradas = RepoEntradas::getEntradas(Conexion::getConexion());
                $gestor_actual = '';
                $ruta_elegida = "vistas/blog.php";
                Conexion::cerrarConexion();
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
               case 'login';
               $ruta_elegida = "vistas/login.php";
                 break;
            //Ruta de logout
            #Requiere de proteccion de vista por usuario
               case 'logout':
                $ruta_elegida = "vistas/logout.php";
                  break;
             //Ruta para agregar un domicilio de usuario
             #Requiere de proteccion de vista por usuario
                   case 'nuevo-domicilio':
                       $ruta_elegida = "plantillas/gestores/gestorUsuarios/nuevoDomicilio.php";
                     break;
             //Ruta para editar el domicilio
             #Requiere de proteccion por usuario
                   case 'editar-domicilio':
                     $ruta_elegida = "plantillas/gestores/gestorUsuarios/editarDomicilio.php";
                     break;
             //Ruta para gestionar el pago del usuario
             #Requiere de proteccion de vista por usuario
                   case 'pagar':
                     $ruta_elegida = "plantillas/gestores/gestorUsuarios/pagos.php";
                    break;
             //Ruta de la vista de compra de articulos
             #Requiere de proteccion de vista por usuario
                   case 'compra':
             Conexion::abrirConexion();
             $productos = RepoCarrito::getProductosCarrito(Conexion::getConexion(), $_SESSION['id_usuario']);
             $domicilio = RepoDomicilio::getDomicilioByIdUser(Conexion::getConexion(), $_SESSION['id_usuario']);
             $eventos = RepoEvento::getEventosEnCarrito(Conexion::getConexion(), $_SESSION['id_usuario']);
             $ruta_elegida = "vistas/compra.php";
             Conexion::cerrarConexion();
                     break;
             //Ruta que muestra los pedidos del usuarios
             #Requiere proteccion de usuario por vista
                   case 'pedidos':
                   Conexion::abrirConexion();
                   $pedido =1;
                   $pedidos1 = 3;
                   $pendientes = 4;
                   $facturacion = 5;
                   $enviados = 2;
                   $pedidos = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $pedido);
                   $envios = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $enviados);
                   $productos_facturados = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $facturacion);
                   $productos_pendientes = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $pendientes);
                   $productos = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $pedidos1);
                   $ruta_elegida = "plantillas/gestores/gestorUsuarios/pedidos.php";
                   Conexion::cerrarConexion();
                     break;
             //Ruta en donde se realizan las solicitudes de facturacion
             #Se requiere de proteccion de usuario por vista
                   case 'facturacion':
                   Conexion::abrirConexion();
                   $pedido =1;
                   $pedidos1 = 3;
                   $pendientes = 4;
                   $facturacion = 5;
                   $enviados = 2;
                   $pedidos = [];
                   $envios = [];
                   $productos_facturados = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $facturacion);
                   $productos_pendientes = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $pendientes);
                   $productos = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $pedidos1);
                   $domicilio = RepoDomicilio::getDomicilioByIdUser(Conexion::getConexion(), $_SESSION['id_usuario']);
                   $ruta_elegida = "plantillas/gestores/gestorUsuarios/compras.php";
                   Conexion::cerrarConexion();
                     break;
             //Ruta del gestor de eventos
             #Se requiere de proteccion por usuario nivel 5
                 case 'registro-eventos':
            Conexion::abrirConexion();
            $eventos = RepoEvento::getEventosComprados(Conexion::getConexion(), $_SESSION['id_usuario']);
            $ruta_elegida = "plantillas/gestores/gestorUsuarios/eventos.php";
            Conexion::cerrarConexion();
                     break;
              //Ruta del carrito de compra
                  case 'carrito':
            Conexion::abrirConexion();
            $productos = RepoCarrito::getProductosCarrito(Conexion::getConexion(), $_SESSION['id_usuario']);
            $eventos = RepoEvento::getEventosEnCarrito(Conexion::getConexion(), $_SESSION['id_usuario']);
            $ruta_elegida = "vistas/carrito.php";
            Conexion::cerrarConexion();
                    break;
          //Ruta para insertar datos del domicilio
                case 'insertar-domicilio':
                    $ruta_elegida = "plantillas/gestores/gestorUsuarios/insertarDomicilio.php";
                  break;
      }
    }if (ControlSesion::sesionIniciada() && $_SESSION['acceso'] == 5) {
      switch ($partes_ruta[1]) {
          //Ruta publica del blog
          #No requiere proteccion
                case 'blog':
                Conexion::abrirConexion();
                $entradas = RepoEntradas::getEntradas(Conexion::getConexion());
                $gestor_actual = '';
                $ruta_elegida = "vistas/blog.php";
                Conexion::cerrarConexion();
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
          Conexion::abrirConexion();
          $array_eventos = RepoEvento::getEventos(Conexion::getConexion());
          $ruta_elegida = 'vistas/evento.php';
          Conexion::cerrarConexion();
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
               case 'login';
               $ruta_elegida = "vistas/login.php";
                 break;
            //Ruta de logout
            #Requiere de proteccion de vista por usuario
               case 'logout':
                $ruta_elegida = "vistas/logout.php";
                  break;
             //Ruta para agregar un domicilio de usuario
             #Requiere de proteccion de vista por usuario
                   case 'nuevo-domicilio':
                       $ruta_elegida = "plantillas/gestores/gestorUsuarios/nuevoDomicilio.php";
                     break;
             //Ruta para editar el domicilio
             #Requiere de proteccion por usuario
                   case 'editar-domicilio':
                     $ruta_elegida = "plantillas/gestores/gestorUsuarios/editarDomicilio.php";
                     break;
            //Ruta para insertar datos del domicilio
                  case 'insertar-domicilio':
                     $ruta_elegida = "plantillas/gestores/gestorUsuarios/insertarDomicilio.php";
                     break;
             //Ruta para gestionar el pago del usuario
             #Requiere de proteccion de vista por usuario
                   case 'pagar':
                     $ruta_elegida = "plantillas/gestores/gestorUsuarios/pagos.php";
                    break;
             //Ruta de la vista de compra de articulos
             #Requiere de proteccion de vista por usuario
                   case 'compra':
             Conexion::abrirConexion();
             $productos = RepoCarrito::getProductosCarrito(Conexion::getConexion(), $_SESSION['id_usuario']);
             $eventos = RepoEvento::getEventosEnCarrito(Conexion::getConexion(), $_SESSION['id_usuario']);
             $domicilio = RepoDomicilio::getDomicilioByIdUser(Conexion::getConexion(), $_SESSION['id_usuario']);
             $ruta_elegida = "vistas/compra.php";
             Conexion::cerrarConexion();
                     break;
             //Ruta que muestra los pedidos del usuarios
             #Requiere proteccion de usuario por vista
             case 'pedidos':
             Conexion::abrirConexion();
             $pedido =1;
             $enviados = 2;
             $pedidos1 = 3;
             $pendientes = 4;
             $facturacion = 5;
             $pedidos = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $pedido);
             $envios = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $enviados);
             $productos_facturados = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $facturacion);
             $productos_pendientes = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $pendientes);
             $productos = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $pedidos1);
             $domicilio = RepoDomicilio::getDomicilioByIdUser(Conexion::getConexion(), $_SESSION['id_usuario']);
             $ruta_elegida = "plantillas/gestores/gestorUsuarios/pedidos.php";
             Conexion::cerrarConexion();
                     break;
             //Ruta en donde se realizan las solicitudes de facturacion
             #Se requiere de proteccion de usuario por vista
             case 'facturacion':
             Conexion::abrirConexion();
             $pedido =1;
             $pedidos1 = 3;
             $pendientes = 4;
             $facturacion = 5;
             $enviados = 2;
             $pedidos = [];
             $envios = [];
             $productos_facturados = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $facturacion);
             $productos_pendientes = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $pendientes);
             $productos = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $pedidos1);
             $domicilios = RepoDomicilio::getDomicilioByIdUser(Conexion::getConexion(), $_SESSION['id_usuario']);
             $ruta_elegida = "plantillas/gestores/gestorUsuarios/compras.php";
             Conexion::cerrarConexion();
                     break;
             //Ruta del gestor de eventos
             #Se requiere de proteccion por usuario nivel 5
             case 'registro-eventos':
             Conexion::abrirConexion();
             $eventos = RepoEvento::getEventosComprados(Conexion::getConexion(), $_SESSION['id_usuario']);
             $ruta_elegida = "plantillas/gestores/gestorUsuarios/eventos.php";
             Conexion::cerrarConexion();
                     break;
              //Esta es la ruta del carrito de compras
            case 'carrito':
            Conexion::abrirConexion();
            $productos = RepoCarrito::getProductosCarrito(Conexion::getConexion(), $_SESSION['id_usuario']);
            $eventos = RepoEvento::getEventosEnCarrito(Conexion::getConexion(), $_SESSION['id_usuario']);
            $ruta_elegida = "vistas/carrito.php";
            Conexion::cerrarConexion();
                    break;
        //Ruta para eliminar productos de la tienda
        #Requiere de proteccion por usuario nivel 5
            case 'borrar-producto';
            $ruta_elegida = "plantillas/borrarProducto.php";
                    break;
        //Ruta del gestor de gestorUsuarios
        #Requiere de proteccion con rango de usuario nivel5
            case 'gestor-promociones':
            Conexion::abrirConexion();
            $promociones = RepoPromociones::getPromociones(Conexion::getConexion());
            $gestor_actual = '';#Se crea una variable para el uso posterior del gestor del carrito
            $ruta_elegida = "vistas/gestorPromociones.php";
            Conexion::cerrarConexion();
                    break;
        //Ruta del gestor de los productos
        #Requiere de proteccion con rango de usuario nivel 5
            case 'gestor-productos':
            Conexion::abrirConexion();
            $vendidos = 1;
            $enviados = 2;
            $factura = 4;
            $ventas = RepoCompra::getCompras(Conexion::getConexion(), $vendidos);
            $envios = RepoCompra::getCompras(Conexion::getConexion(), $enviados);
            $facturas = RepoCompra::getCompras(Conexion::getConexion(), $factura);
            $gestor_actual = '';#Se crea una variable para el uso posterior del gestor del carrito
            $ruta_elegida = "vistas/gestorProductos.php";
            Conexion::cerrarConexion();
                    break;
        //Ruta del gestor del blog de noticias
        #Requiere de proteccion con rango de usuario nivel 5
            case 'gestor-blog':
            Conexion::abrirConexion();
            $borradores = 1;
            $gestor_actual = '';#Se crea una variable para el uso posterior del gestor del carrito
            $ruta_elegida = "vistas/gestorBlog.php";
            Conexion::cerrarConexion();
                    break;
            case 'gestor-domicilio':
            Conexion::abrirConexion();
            $estados = RepoDomicilio::getEstados(Conexion::getConexion());
            $gestor_actual = '';
            $ruta_elegida = "vistas/gstorDomicilio.php";
            Conexion::cerrarConexion();
              break;
            case 'gestor-eventos':
            Conexion::abrirConexion();
            $gestor_actual = '';
            $ruta_elegida = "vistas/gestorEventos.php";
            Conexion::cerrarConexion();
              break;
            case 'gestor-envio':
            Conexion::abrirConexion();
            $estados = RepoDomicilio::getEstados(Conexion::getConexion());
            $gestor_actual = '';
            $ruta_elegida = "vistas/gestorEnvios.php";
            Conexion::cerrarConexion();
              break;
      }
    }if (ControlSesion::sesionIniciada() && $_SESSION['acceso'] < 2) {
      switch ($partes_ruta[1]) {
            //Ruta de logout
            #Requiere de proteccion de vista por usuario
               case 'logout':
                $ruta_elegida = "vistas/logout.php";
                  break;
            //Ruta del medio de contacto por email
            #No requiere proteccion
               case 'contacto':
               $ruta_elegida = "vistas/contacto.php";
                 break;
      }
    }
    else {
      switch ($partes_ruta[1]) {
          //Ruta publica del blog
          #No requiere proteccion
                case 'blog':
                Conexion::abrirConexion();
                $entradas = RepoEntradas::getEntradas(Conexion::getConexion());
                $gestor_actual = '';
                $ruta_elegida = "vistas/blog.php";
                Conexion::cerrarConexion();
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
                  Conexion::abrirConexion();
                  $array_eventos = RepoEvento::getEventos(Conexion::getConexion());
                  $ruta_elegida = 'vistas/evento.php';
                  Conexion::cerrarConexion();
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
            //Ruta de registro correcto
            #Requiere de proteccion por vista
              case 'registro-correcto':
              $ruta_elegida = "plantillas/registroCorrecto.inc.php";
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
        }
    }
/*Creamos los gestores de administracion*/
#Gestor de la tienda(Vista publica)
  }else if(count($partes_ruta) == 3){
    if($partes_ruta[1] == 'tienda'){
      switch ($partes_ruta[2]) {
        case 'productos':
        $gestor_actual = 'productos';
        $ruta_elegida = 'vistas/tienda.php';
          break;
        case 'resultado-busqueda':
        $ruta_elegida = 'vistas/tienda.php';
          break;
      }
    }
    if ($partes_ruta[1] == 'activar-usuario') {
      $url = $partes_ruta[2];
      $ruta_elegida = "vistas/activarUsuario.php";
    }
##Gestor del blog
    if ($partes_ruta[1] == 'gestor-blog' && ControlSesion::sesionIniciada() && $_SESSION['acceso'] == 5) {
        switch ($partes_ruta[2]) {
          case 'escribir-entrada':
            $gestor_actual = 'escribir-entrada';
            $ruta_elegida = "vistas/gestorBlog.php";
            break;
          case 'panel-entradas':
          Conexion::abrirConexion();
          $entradas = RepoEntradas::getEntradas(Conexion::getConexion());
          $gestor_actual = 'panel-entradas';
          $ruta_elegida = 'vistas/gestorBlog.php';
          Conexion::cerrarConexion();
            break;
          case 'borrar-entrada':
          $gestor_actual = "borrar-entrada";
          $ruta_elegida = 'vistas/gestorBlog.php';
            break;
        }
  }
#Gestor Eventos
  if ($partes_ruta[1] == 'gestor-eventos' && ControlSesion::sesionIniciada() && $_SESSION['acceso'] == 5) {
      switch ($partes_ruta[2]) {
        case 'nuevo-evento':
          Conexion::abrirConexion();
          $domicilio = RepoDomicilio::getDomicilioByIdUser(Conexion::getConexion(), $_SESSION['id_usuario']);
          $gestor_actual = 'nuevo-evento';
          $ruta_elegida = "vistas/gestorEventos.php";
          Conexion::cerrarConexion();
          break;
        case 'culminar-evento':
        Conexion::abrirConexion();
        $evento = RepoEvento::getEventosAll(Conexion::getConexion());
        $gestor_actual = 'eliminar-evento';
        $ruta_elegida = "vistas/gestorEventos.php";
        Conexion::cerrarConexion();
          break;
      }
}
#Gestor de productos
    if ($partes_ruta[1] == 'gestor-productos' && ControlSesion::sesionIniciada() && $_SESSION['acceso'] == 5) {
      switch ($partes_ruta[2]) {
        case 'nuevo':
        Conexion::abrirconexion();
        $categorias = RepoProductos::getCategoria(Conexion::getConexion());
        $gestor_actual = 'nuevo';
        $ruta_elegida = "vistas/gestorProductos.php";
        Conexion::cerrarConexion();
          break;
        case 'inventario':
        Conexion::abrirConexion();
        $productos = RepoProductos::getTodosProductosTienda(Conexion::getConexion());
        $gestor_actual = 'inventario';
        $ruta_elegida = "vistas/gestorProductos.php";
        Conexion::cerrarConexion();
          break;
        case 'borrar-producto':
        $gestor_actual = 'borrar-producto';
        $ruta_elegida = "vistas/gestorProductos.php";
          break;
        case 'productos-vendidos':
        Conexion::abrirConexion();
        $status = 1;
        $ventas = RepoCompra::getCompras(Conexion::getConexion(), $status);
        $gestor_actual = 'productos-vendidos';
        $ruta_elegida = "vistas/gestorProductos.php";
        Conexion::cerrarConexion();
          break;
        case 'productos-enviados':
        Conexion::abrirConexion();
        $status = 2;
        $pedidos = [];
        $productos = [];
        $productos_pendientes = [];
        $productos_facturados = [];
        $envios = RepoCompra::getCompras(Conexion::getConexion(), $status);
        $gestor_actual = 'productos-enviados';
        $ruta_elegida = "vistas/gestorProductos.php";
        Conexion::cerrarConexion();
          break;
        case 'facturas-pendientes':
        Conexion::abrirConexion();
        $status = 4;
        $pedidos = [];
        $productos = [];
        $productos_pendientes = [];
        $envios = [];
        $productos_facturados = RepoCompra::getSolicitudFactura(Conexion::getConexion(), $status);
        $gestor_actual = 'facturas-pendientes';
        $ruta_elegida = "vistas/gestorProductos.php";
        Conexion::cerrarConexion();
          break;
        case 'categorias':
        Conexion::abrirConexion();
        $categorias = RepoProductos::getCategoria(Conexion::getConexion());
        $gestor_actual = 'categorias';
        $ruta_elegida = 'vistas/gestorProductos.php';
        Conexion::cerrarConexion();
          break;
        case 'historico':
        Conexion::abrirConexion();
        $status = 5;
        $pedidos = [];
        $productos = [];
        $productos_pendientes = [];
        $envios = [];
        $productos_facturados = RepoCompra::getCompras(Conexion::getConexion(), $status);
        $gestor_actual = 'historico';
        $ruta_elegida = 'vistas/gestorProductos.php';
        Conexion::cerrarConexion();
          break;
      }
    }
    #Gestor de usuarios
    if ($partes_ruta[1] == 'gestor-promociones' && ControlSesion::sesionIniciada() && $_SESSION['acceso'] == 5) {
      switch ($partes_ruta[2]) {
        case 'nueva-promo':
          $gestor_actual = 'nueva-promo';
          $ruta_elegida = "vistas/gestorPromociones.php";
          break;$estados = RepoDomicilio::getEstados(Conexion::getConexion());
        case 'asignar-promo':
        Conexion::abrirConexion();
          $productos = RepoProductos::getTodosProductos(Conexion::getConexion());
          $promociones = RepoPromociones::getPromociones(Conexion::getConexion());
          $productos_con_promo = RepoPromociones::getProductosConPromocion(Conexion::getConexion());
          $gestor_actual = 'asignar-promo';
          $ruta_elegida = "vistas/gestorPromociones.php";
        Conexion::cerrarConexion();
          break;
          case 'eliminar-promo-prod':
          Conexion::abrirConexion();
          $productos_con_promo = RepoPromociones::getProductosConPromocion(Conexion::getConexion());
          $gestor_actual = 'eliminar-promo-prod';
          $ruta_elegida = "vistas/gestorPromociones.php";
          Conexion::cerrarConexion();
            break;
          case 'eliminar-promo':
          Conexion::abrirConexion();
          $promociones = RepoPromociones::getPromociones(Conexion::getConexion());
          $gestor_actual = 'eliminar-promo';
          $ruta_elegida = "vistas/gestorPromociones.php";
          Conexion::cerrarConexion();
            break;
      }
    }
    if ($partes_ruta[1] == 'gestor-domicilio' && ControlSesion::sesionIniciada() && $_SESSION['acceso'] == 5) {
      switch ($partes_ruta[2]) {
        case 'estado':
        Conexion::abrirConexion();
        $estados = RepoDomicilio::getEstados(Conexion::getConexion());
        $gestor_actual = 'estado';
        $ruta_elegida = "vistas/gstorDomicilio.php";
        Conexion::cerrarConexion();
          break;
        case 'municipio':
        Conexion::abrirConexion();
        $estados = RepoDomicilio::getEstados(Conexion::getConexion());
        $minucipios = RepoDomicilio::getMunicipios(Conexion::getConexion());
        $gestor_actual = 'municipio';
        $ruta_elegida = "vistas/gstorDomicilio.php";
        Conexion::cerrarConexion();
          break;
        case 'codigo-postal':
        Conexion::abrirConexion();
        $estados = RepoDomicilio::getEstados(Conexion::getConexion());
        $codigos = RepoDomicilio::getCodigosPostales(Conexion::getConexion());
        $gestor_actual = 'codigo-postal';
        $ruta_elegida = "vistas/gstorDomicilio.php";
        Conexion::cerrarConexion();
          break;
      }
    }
    if ($partes_ruta[1] == 'gestor-envio' && ControlSesion::sesionIniciada() && $_SESSION['acceso'] == 5) {
      switch ($partes_ruta[2]) {
        case 'crear-cargo':
        Conexion::abrirConexion();
        $estados = RepoDomicilio::getEstados(Conexion::getConexion());
        $gestor_actual = 'crear-cargo';
        $ruta_elegida = 'vistas/gestorEnvios.php';
        Conexion::cerrarConexion();
          break;
        case 'gestionar-cargos':
        $gestor_actual = 'gestionar-cargos';
        $ruta_elegida = 'vistas/gestorEnvios.php';
          break;
      }
    }
    /*Creamos las vistas de productos o articulos especificos*/
    #Vista de las entradas del blog
    if ($partes_ruta[1] == 'entrada') {
    $url = $partes_ruta[2];
    Conexion::abrirConexion();
    $entrada = RepoEntradas::getEntradaByUrl(Conexion::getConexion(), $url);
    if (!empty($entrada)) {
      $ruta_elegida = 'vistas/entrada.php';
    }
    Conexion::cerrarConexion();
    }
    #Vistas de los productos de la tienda
    if ($partes_ruta[1] == 'producto') {
    $url = $partes_ruta[2];
    Conexion::abrirConexion();
    if (ControlSesion::sesionIniciada()) {
      $id_usuario = $_SESSION['id_usuario'];
    }
    $producto = RepoProductos::getProductosByUrl(Conexion::getConexion(), $url);
    $categoria = RepoProductos::getCategoriaById(Conexion::getConexion(), $producto -> getCategoriaProducto());
      if ($producto != null) {
    $ruta_elegida = "vistas/producto.php";
    Conexion::cerrarConexion();
      }
Conexion::cerrarConexion();
    }
    #Vistas del perfil de usuario
    if ($partes_ruta[1] == 'usuario') {
      if (ControlSesion::sesionIniciada()) {
        $gestor_actual = '';
        $url = $partes_ruta[2];
        Conexion::abrirConexion();
        $pedido = 1;
        $enviados = 2;
        $facturas = 3;
        $usuario = RepoUsuario::getUserById(Conexion::getConexion(),$url);
        $domicilio = RepoDomicilio::getDomicilioByIdUser(Conexion::getConexion(), $_SESSION['id_usuario']);
        $factura = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $facturas);
        $pedidos = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $pedido);
        $envios = RepoCompra::getComprasByIdUser(Conexion::getConexion(), $_SESSION['id_usuario'], $enviados);
        $eventos = RepoEvento::getEventosComprados(Conexion::getConexion(), $_SESSION['id_usuario']);
        if ($usuario != null) {
        $ruta_elegida = "vistas/user.php";
        Conexion::cerrarConexion();
        }
      }
    }
  }
}
include_once $ruta_elegida;
?>
