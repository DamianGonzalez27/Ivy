
<div class="form-group">
<label>Nombre</label>
<input type="text" class="form-control" name="nombre" placeholder="Tu nombre aqui" required <?php $validador -> mostrarNombre() ?>>
<?php $validador -> mostrtarErrorNombre(); ?>
</div>

<div class="form-group">
<label>Apellido</label>
<input type="text" class="form-control" name="apellido" placeholder="Tu apellido aqui" required <?php $validador -> mostrarApellido() ?>>
<?php $validador -> mostrarErrorApellido(); ?>
</div>

<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="correo" placeholder="ejemplo@mail.com" required <?php $validador -> mostrarCorreo(); ?>>
<?php $validador -> mostrarErrorCorreo(); ?>
</div>

<div class="form-group">
<label>Telefono</label>
<input type="text" class="form-control" name="telefono" placeholder="5555555555" required>
</div>

<div class="form-group">
<label>Contraseña</label>
<input type="password" class="form-control" name="clave1" placeholder="*****************" required>
<?php $validador -> mostrarErrorClave1(); ?>
</div>

<div class="form-group">
<label>Repite tu contraseña</label>
<input type="password" class="form-control" name="clave2" placeholder="*****************" required>
<?php $validador -> mostrarErrorClave2(); ?>
</div>
 <br>
<button type="submit" class="btn bt-default btn-primary" name="enviar">Registrar</button>
<br>
<br>
<a href="<?php echo RUTA_LOGIN?>">¿Ya tienes una cuenta?</a>
<br>
<br>
