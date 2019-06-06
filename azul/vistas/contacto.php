<?php
$titulo = 'Contacto';
include_once 'app/config.inc.php';
include_once 'plantillas/apertura.inc.php';
include_once 'plantillas/barra-nav.inc.php';

if (isset($_POST['enviar'])) {
  $nombre = $_POST['nombre'];
  $asunto = $_POST['asunto'];
  $mail = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $mensaje = $_POST['mensaje'];
  $correo = 'damian27goa@gmail.com'; //Correo electronico de atencion a clientes

$enviar = mail($correo, $asunto, $mensaje, "FROM: $mail");

if ($enviar) {
  echo "<script>alert('Correo enviado con exito\n Gracias, en breve nos comunicaremos contigo');</script>";
}
}
 ?>
<div class="jumbotron text-center">
  <h1>Contactanos</h1>
  <p>Tel: (55) 2625-7055</p>
  <p>pedidos@azuldiagnostic.com</p>
</div>

<div class="container-fluid separador">
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 class="text-center panel-title"><i class="fa fa-envelope"></i> Envianos un e-mail</h1>
      </div>
      <div class="panel-body">
        <form role="form" method="POST" action="<?php echo RUTA_CONTACTO;?>">
        <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" name="nombre" placeholder="Tu nombre aqui" required>
        </div>

        <div class="form-group">
        <label>Asunto</label>
        <input type="text" class="form-control" name="asunto" placeholder="Tu apellido aqui" required>
        </div>

        <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="correo" placeholder="ejemplo@mail.com" required>
        </div>

        <div class="form-group">
        <label>Telefono</label>
        <input type="text" class="form-control" name="telefono" placeholder="5555555555" required>
        </div>

        <div class="form-group">
        <label>Escribe tu mensaje</label>
        <textarea class="form-control text-justify texto-entrada" name="mensaje" required placeholder="Escribe aqui tu articulo"></textarea>
        </div>


         <br>
        <button type="submit" class="btn bt-default btn-primary" name="enviar">Enviar</button>
        <br>
        <br>
     </form>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include_once 'plantillas/cierre.inc.php';
 ?>
