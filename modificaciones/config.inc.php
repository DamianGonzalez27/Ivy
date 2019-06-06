<?php
#Constantes de la base
define('NOMBRE_SERVIDOR', 'mysql.hostinger.mx');
define('NOMBRE_USER', 'u645359815_damia');
define('NOMBRE_BASE', 'u645359815_azul');
define('PASS', 'DamianGonzalez@3101!');

#Routs
define("SERVIDOR", "http://obelisktech.hol.es");

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

#Gestor de usuarios de admin
define("RUTA_GESTOR_USUARIOS", SERVIDOR."/gestor-usuarios");
#creamos las rutas del subgestor de las promociones
define("RUTA_NUEVo_USUARIO",RUTA_GESTOR_USUARIOS ."/nuevo-usuario");

#Creamos el gestor principal
define("RUTA_TIENDA", SERVIDOR."/tienda");
#Creamos los subgestores
define("RUTA_QUIMICA", RUTA_TIENDA."/quimica-clinica");
define("RUTA_MICRO", RUTA_TIENDA."/microbiologia");
define("RUTA_PARA", RUTA_TIENDA."/parasitlogia");
define("RUTA_HEMA", RUTA_TIENDA."/hematologia");
define("RUTA_SERO", RUTA_TIENDA."/serologia");
define("RUTA_EQUIPOS_LAB", RUTA_TIENDA."/equipos-laboratorio");
define("RUTA_CONSUMIBLES", RUTA_TIENDA."/consumibles");
define("RUTA_RESULTADO_BUSQUEDA", RUTA_TIENDA."/");


#Rutas de los medios
define("RUTA_CSS", SERVIDOR. '/css/');#Ruta de archivos css
define("RUTA_JS", SERVIDOR. '/js/');#Ruta de archivos js
define("RUTA_IMAGENES",SERVIDOR.'/media/');#Ruta de multimedia
define("DIRECTORIO_RAIZ", realpath(__DIR__."/.."));

#Rutas de redes sociales
define("RUTA_FACEBOOK", "https://www.facebook.com/azuldiagnosticsadecv/");#Ruta de Facebook
define("RUTA_YOUTUBE", "https://www.youtube,com");#Ruta de Youtube
define("RUTA_TWITTER", "https://www.twitter.com");#ruta de twitter




 ?>
