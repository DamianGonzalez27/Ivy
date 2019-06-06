<div class="form-group">
<label>Titulo de la entrada</label>
<input type="text" class="form-control" name="titulo_entrada" placeholder="Título de la entrada" <?php $validador -> setTituloEntrada(); ?>>
<?php
$validador -> setErrorTitulo();
 ?>
</div>
<div class="form-group">
<label>Cuerpo de la entrada</label>
<textarea class="form-control text-justify texto-entrada" name="cuerpo_entrada"  placeholder="Escribe aqui tu articulo"><?php $validador -> setTextoEntrada(); ?></textarea>
<?php
$validador -> setErrorCuerpo();
 ?>
</div>
<div class="form-group">
  <input type="file" name="archivo_subido" class="btn btn-primary" id="archivo_subido">
</div>
 <br>
<button type="submit" class="btn bt-default btn-primary" name="publicar">Publicar</button>
<br>
<br>
</form>
