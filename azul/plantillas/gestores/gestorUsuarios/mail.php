<?php
/*Variables para el envio de correo electronico*/
  $cabeceras = 'MIME-Version: 1.0' . "\r\n";
  $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  $cabeceras .= 'From: Azul Diagnostic<no-reply@azuldiagnost.com>';

/*Crearemos el cuerpo del mensaje*/

$primera_parte = '<html lang="en">'.
                 '<head>'.
                 '<style>'.
                 'body{bckgraund-color: rgb(188, 227, 251); }'.
                 '.titulo{color: rgb(0, 3, 78); text-align:center;}'.
                 '</style>'.
                 '<title>Azul Diagnostic</title>'.
                 '</head>'.
                 '<body">'.
                 '<h1 class= "titulo">Gracias por registrarte</h1>';

$final  = '</body>'.
          '</html>';

 ?>
