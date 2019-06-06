<?php
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';
include_once 'app/redireccion.inc.php';
 ?>

 <div class="container">
 <div class="jumbotron">
     <div class="container text-center">
       <h1>¡Gracias por registrarte!</h1>
       <p><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> <b></b></p>
     </div>
   </div>
</div>


 <div class="container">
 <div class="row">
   <div class="col-md-12 text-center">
     <div class="panel panel-default">
       <div class="panel-heading">
         <p class="text-center">Registro Correcto</p>
       </div>
       <div class="panel-body">
         <p>Se te ha enviado un correo electronico para que así puedas verificar tu cuenta</p>
         <p>Recuerda verificar tu correo electronico para poder usar la plataforma web</p>
         <p>Si no verificas tu correo no podras hacer tus compras</p>
         <p>Para <a href=" <?php echo RUTA_LOGIN;?>">Iniciar sesion</a> </p>
       </div>
     </div>
   </div>
 </div>
 </div>
<hr class="featurette-divider">

<?php
include_once 'plantillas/cierre.inc.php';
 ?>
