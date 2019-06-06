<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php

if (!isset($titulo) || empty($titulo)) {
  $titulo = 'Azul Diagnostic';
}
if(!isset($keywords) || empty($keywords)){
  $keywords = 'Azul, Diagnostic, Laboratorio, Equipos, Clinico, Diagnostico';
}
if (!isset($descipcion) || empty($descipcion)) {
  $descipcion = 'Comercializadora líder en productos y tecnologías para laboratorios clínicos en las áreas de Química Clínica, Hematología, Bacteriología, Microbiología.';
}

echo "<title>$titulo</title>";


 ?>
<meta name="keywords" content="<?php echo $keywords;?>">
<meta name="description" content="<?php echo $descipcion;?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo RUTA_CSS?>estilos.css">
<link rel="stylesheet" href="<?php echo RUTA_CSS?>animate.css">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Mina" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Alegreya+SC" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cabin+Condensed" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo RUTA_IMAGENES;?>azulLogo.png">
<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script defer src="<?php echo RUTA_JS;?>funciones.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
