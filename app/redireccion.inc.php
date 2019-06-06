<?php
//Con esta clase realizamos las diferentes redirecciones dentro de la aplicacion web
class Redireccion{

#Con este metodo redirigimos y recibmos una variable de redireccion
	public static function redirigir($url){
		header('Location: ' . $url, true, 301);
		od_end_flush();
		exit();
	}

}

 ?>
