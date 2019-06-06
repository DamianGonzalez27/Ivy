<?php
include_once 'app/controlSesion.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoCarrito.php';
Conexion::abrirConexion();
 ?>
<nav class="navbar navbar-default navbar-fixed-top">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" name="colapsar">
    <span class="sr-only">
      Este boton despliega la barra de navegacion
    </span>
  <i class="fa fa-navicon" aria-hidden="true"></i>
    </button>
    <a class="navbar-brand" href="<?php echo SERVIDOR;?>">
      <img src="<?php echo RUTA_IMAGENES;?>azulLogo.png">
    </a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
     <ul class="nav navbar-nav navbar-right">
       <?php
/*Aqui voy a crear el sistema de accesos de acuerdo al tipo de usuario que entre en la pagina web*/
       if (ControlSesion::sesionIniciada()) {
       ?>
       <li><a href="<?php echo RUTA_USER.'/'.$_SESSION['id_usuario'];?>"><i class="fa fa-child" aria-hidden="true"></i>
         <?php echo $_SESSION['nombre_usuario']; ?>
       </a></li>
       <?php
       if ($_SESSION['acceso'] == 5) {
      /*Estas son las rutas que apareceran cuando el usuario sea administrador*/
        ?>
        <li><a href="<?php echo RUTA_NOSOTROS;?>" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs" aria-hidden="true"></i> Administracion <span class="caret"></span>
          <ul class="dropdown-menu admin">
            <li><a href="<?php echo RUTA_GESTOR_PRODUCTOS;?>">Productos</a></li>
            <li><a href="<?php echo RUTA_GESTOR_PROMOCIONES;?>">Promociones</a></li>
            <li><a href="<?php echo RUTA_GESTOR_EVENTO;?>">Eventos</a></li>
            <li><a href="<?php echo RUTA_GESTOR_BLOG;?>">Blog</a></li>
            <li><a href="<?php echo RUTA_GESTOR_DOMICILIO;?>">Domicilio</a></li>
            <li><a href="<?php echo RUTA_GASTOR_ENVIOS;?>">Cargos de envio</a></li>
          </ul>
        </a></li>
        <li><a href="<?php echo RUTA_TIENDA; ?>"><i class="fa fa-tag" aria-hidden="true"></i> Tienda</a></li>
        <li><a href="<?php echo RUTA_BLOG; ?>"><i class="fa fa-bookmark" aria-hidden="true"></i> Blog</a></li>
        <li><a href="<?php echo RUTA_EVENTO; ?>"><i class="fa fa-flag" aria-hidden="true"></i> Eventos</a></li>
        <?php
/*Aqui pondremos los articulos que se acumulan en el carrito*/
#Realizamos una consulta para obtener la cantidad de productos en el carrito
$productos_carrito = RepoCarrito::getCantidadProductosCarrito(Conexion::getConexion(), $_SESSION['id_usuario']);
if ($productos_carrito > 0) {
?>
<li><a href="<?php echo RUTA_CARRITO; ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Carrito <i id="carrito"><?php echo $productos_carrito;?></i></a></li>
<?php
}else {
?>
<li><a href="<?php echo RUTA_CARRITO; ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Carrito <i id="carritoCero">0</i></a></li>
<?php
}
         ?>
        <li><a href="<?php echo RUTA_LOGOUT; ?>"><i class="fa fa-power-off" aria-hidden="true"></i> Cerrar</a></li>
        <?php


/*Este es el ingreso de los usuarios con la cuenta verificada*/
      }else if($_SESSION['acceso'] < 2){
  /*Esta son las ruta que aparecen cuando el usuario aun no activa su cuenta*/
?>
<li><a href="<?php echo RUTA_CONTACTO; ?>"><i class="fa fa-envelope" aria-hidden="true"></i> Contactanos</a></li>
<li><a href="<?php echo RUTA_LOGOUT; ?>"><i class="fa fa-power-off" aria-hidden="true"></i> Cerrar</a></li>
<?php

/*Este es el acceso de los usuarios sin registrar*/
}else if($_SESSION['acceso'] == 2){
/*Estas son las rutas de usuario cuando la cuenta ya esta activada*/
?>
<li><a href="<?php echo RUTA_TIENDA; ?>"><i class="fa fa-tag" aria-hidden="true"></i> Tienda</a></li>
<li><a href="<?php echo RUTA_BLOG; ?>"><i class="fa fa-bookmark" aria-hidden="true"></i> Blog</a></li>
<li><a href="<?php echo RUTA_EVENTO; ?>"><i class="fa fa-flag" aria-hidden="true"></i> Eventos</a></li>
<?php
/*Aqui pondremos los articulos que se acumulan en el carrito*/
#Realizamos una consulta para obtener la cantidad de productos en el carrito
$productos_carrito = RepoCarrito::getCantidadProductosCarrito(Conexion::getConexion(), $_SESSION['id_usuario']);
if ($productos_carrito > 0) {
?>
<li><a href="<?php echo RUTA_CARRITO; ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Carrito <i id="carrito"><?php echo $productos_carrito;?></i></a></li>
<?php
}else {
?>
<li><a href="<?php echo RUTA_CARRITO; ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Carrito <i id="carritoCero">0</i></a></li>
<?php
}
?>
<li><a href="<?php echo RUTA_LOGOUT; ?>"><i class="fa fa-power-off" aria-hidden="true"></i> Cerrar</a></li>
 <?php
}

/*Estos son los controles de una sesion sin iniciar*/
}else{
/*Estas son las rutas de las vistas de la pagina principal sin sesion abierta*/
  ?>
  <li><a href="<?php echo RUTA_TIENDA; ?>"><i class="fa fa-tag" aria-hidden="true"></i> Tienda</a></li>
  <li><a href="<?php echo RUTA_BLOG; ?>"><i class="fa fa-bookmark" aria-hidden="true"></i> Blog</a></li>
  <li><a href="<?php echo RUTA_EVENTO; ?>"><i class="fa fa-flag" aria-hidden="true"></i> Eventos</a></li>
 <li><a href="<?php echo RUTA_LOGIN; ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar/Registro</a></li>
  <?php
}
   ?>
     </ul>
   </div>
 </div>
 </nav>
<?php
Conexion::cerrarConexion();
 ?>
