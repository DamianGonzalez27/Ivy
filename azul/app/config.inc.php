<?php
#Constantes de la base
define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_USER', 'root');
define('NOMBRE_BASE', 'azulproduccion');
define('PASS', '');

#Routs
define("SERVIDOR", "localhost/azul/");
#Rutas principales del enrutador
define("RUTA_NOSOTROS", SERVIDOR."/nosotros");#Ruta de la pagina nosotros
define("RUTA_CONTACTO", SERVIDOR."/contacto");#Ruta de medios de contacto
define("RUTA_BLOG", SERVIDOR."/blog");#Ruta del blog
define("RUTA_USER", SERVIDOR."/usuario");#Ruta del peril de usuario
define("RUTA_REGISTRO", SERVIDOR."/registro");#Ruta del formulario de registro
define("RUTA_PRODUCTO", SERVIDOR."/producto");#Ruta de la vista del producto
define("RUTA_PRIVACIDAD", SERVIDOR."/privacidad");#Ruta del aviso de privacidad
define("RUTA_ENTRADA", SERVIDOR."/entrada");#Ruta de la vista del blog
define("RUTA_EVENTO", SERVIDOR."/evento");#Ruta de la vista de los eventos
define("RUTA_CARRITO", SERVIDOR."/carrito");#Ruta del carrito de compras
define("RUTA_COMPRA", SERVIDOR."/compra");#Ruta del formulario de compra
define("RUTA_NUEVO_DOMICILIO", SERVIDOR."/nuevo-domicilio");#Ruta para ingresar un nuevo domicilio
define("RUTA_EDITAR_DOMICILIO", SERVIDOR."/editar-domicilio");#Ruta para editar el domicilio
define("RUTA_BORRAR_CARRITO", SERVIDOR."/borrar-producto");#Herramienta para eliminar productos del carrito
define("RUTA_LOGIN", SERVIDOR."/login");#Ruta del login
define("RUTA_LOGOUT", SERVIDOR."/logout");#Herramienta para cerrar sesion
define("RUTA_REGCORRECTO", SERVIDOR."/registro-correcto");#Ruta para el registro correcto de los usuarios
define("RUTA_PAGOS", SERVIDOR."/pagar");#Ruta de la vista para pagar el pdoructo
define("RUTA_PEDIDOS", SERVIDOR."/pedidos");#Ruta de la vista de los pedidos del usuario
define("RUTA_FAQS", SERVIDOR."/preguntas");#Ruta de preguntas frecuentes
define("RUTA_FACTURACION", SERVIDOR."/facturacion");#Ruta de compras y facturacion
define("RUTA_REGISTROEVENTOS", SERVIDOR."/registro-eventos");#Ruta en donde se ven los eventos a los cuales estan registrados

#Rutas sin vista en la web
define("RUTA_INSERTDOMICILIO", SERVIDOR."/insertar-domicilio");

#Gestor del blog
define("RUTA_GESTOR_BLOG", SERVIDOR."/gestor-blog");
#Aqui creamos los subgestores del gestor del blog
define("RUTA_ESCRIBIR_ENTRADA",RUTA_GESTOR_BLOG."/escribir-entrada");
define("RUTA_PANEL_ENTRADA",RUTA_GESTOR_BLOG."/panel-entradas");
define("RUTA_BORRAR_ENTRADA",RUTA_GESTOR_BLOG."/borrar-entrada" );

#Gestor de productos
define("RUTA_GESTOR_PRODUCTOS", SERVIDOR."/gestor-productos");
#aqui creamos las rutas del subgestor de productos
define("RUTA_PRODUCTOS_NUEVO",RUTA_GESTOR_PRODUCTOS."/nuevo");
define("RUTA_INVENTARIO",RUTA_GESTOR_PRODUCTOS."/inventario");
define("RUTA_BORRAR_PRODUCTO",RUTA_GESTOR_PRODUCTOS."/borrar-producto");
define("RUTA_EDITAR_PRODUCTO",RUTA_GESTOR_PRODUCTOS."/editar-producto");
define("RUTA_VENDIDOS", RUTA_GESTOR_PRODUCTOS."/productos-vendidos");
define("RUTA_ENVIADOS", RUTA_GESTOR_PRODUCTOS."/productos-enviados");
define("RUTA_FACTURAS", RUTA_GESTOR_PRODUCTOS."/facturas-pendientes");
define("RUTA_HISTORICO", RUTA_GESTOR_PRODUCTOS."/historico");
define("RUTA_CATEGORIAS",RUTA_GESTOR_PRODUCTOS."/categorias" );

#Gestor de usuarios de admin
define("RUTA_GESTOR_PROMOCIONES", SERVIDOR."/gestor-promociones");
define("RUTA_NUEVA_PROMO", RUTA_GESTOR_PROMOCIONES."/nueva-promo");
define("RUTA_ASIGNAR_PROMO", RUTA_GESTOR_PROMOCIONES."/asignar-promo");
define("RUTA_ELIMINAR_PROMO_PROD", RUTA_GESTOR_PROMOCIONES."/eliminar-promo-prod");
define("RUTA_ELIMINAR_PROMO", RUTA_GESTOR_PROMOCIONES."/eliminar-promo");

#Creamos el gestor principal
define("RUTA_TIENDA", SERVIDOR."/tienda");

#creamos el gestor de los domicilios
define("RUTA_GESTOR_DOMICILIO", SERVIDOR."/gestor-domicilio");
#Creamos las rutas de los subgestores del domicilo
define("RUTA_ESTADO", RUTA_GESTOR_DOMICILIO."/estado");
define("RUTA_MUNICIPIO", RUTA_GESTOR_DOMICILIO."/municipio");
define("RUTA_CODIGO_POSTAL", RUTA_GESTOR_DOMICILIO."/codigo-postal");

#Creamos las rutas del gestor de los eventos
define("RUTA_GESTOR_EVENTO", SERVIDOR."/gestor-eventos");
#Creamos las rutas del subgesto de los eventos
define("RUTA_NUEVO_EVENTO", RUTA_GESTOR_EVENTO."/nuevo-evento");
define("RUTA_CULMINAR_EVENTO", RUTA_GESTOR_EVENTO."/culminar-evento");

#Creamos la ruta del gestor de los costos de envio
define("RUTA_GASTOR_ENVIOS", SERVIDOR."/gestor-envio");
#Creamos las rutas del gestor de los gastos de envio
define("RUTA_CREAR_COSTO_ENVIO", RUTA_GASTOR_ENVIOS."/crear-cargo");
define("RUTA_GESTIONAR_CARGOS", RUTA_GASTOR_ENVIOS."/gestionar-cargos");

#Rutas de los medios
define("RUTA_CSS", SERVIDOR. '/css/');#Ruta de archivos css
define("RUTA_JS", SERVIDOR. '/js/');#Ruta de archivos js
define("RUTA_IMAGENES",SERVIDOR.'/media/');#Ruta de multimedia
define("RUTA_IMGPRODUCTOS", SERVIDOR."/productos/");
define("RUTA_IMAGENES_BLOG", SERVIDOR."/blog_imagenes/");
define("DIRECTORIO_RAIZ", realpath(__DIR__."/.."));
//define("DIRECTORIO_RAIZ", realpath(dirname(__FILE__)."/..");

#Rutas de activacion y recuperacion de contraseña
define('RUTA_ACTIVACION', SERVIDOR."/activar-usuario");

#Rutas de redes sociales
define("RUTA_FACEBOOK", "https://www.facebook.com/azuldiagnosticsadecv/");#Ruta de Facebook
define("RUTA_YOUTUBE", "https://www.youtube,com");#Ruta de Youtube
define("RUTA_TWITTER", "https://www.twitter.com");#ruta de twitter




 ?>
