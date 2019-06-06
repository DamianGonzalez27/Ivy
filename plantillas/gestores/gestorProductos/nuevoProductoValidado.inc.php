<div class="form-group">
  <label>Nombre del producto</label><br>
  <input type="text" name="nombre" <?php $validador -> getNombre();?>>
  <?php
$validador -> setErrorNombre();
   ?>
</div>
<div class="form-group">
  <label>Precio</label><br>
  <input type="text" name="precio" <?php $validador -> getPrecio();?>>
  <?php
$validador -> setErrorPrecio();
   ?>
</div>
<div class="form-group">
  <label>Descripcion</label><br>
  <textarea class="form-control text-justify texto-entrada" name="descripcion"><?php
$validador -> getDescripcion();
    ?></textarea>
  <?php
$validador -> setErrorDescripcion();
   ?>
</div>
<div class="form-group">
  <label>Palabras clave</label><br>
  <input type="text" name="keyword" <?php $validador -> getKeyword();?>>
  <?php
$validador -> setErrorKeyword();
   ?>
</div>
<div class="form-group">
  <label>Selecciona la categoria</label><br>
  <select name="categoria">
<?php Helper::setCategorias($categorias);?>
  </select>
</div>
<div class="form-group">
<label>Stock inicial</label>
<input type="number" name="stock">
</div>
<div class="form-group">
<label>Codigo interno</label>
<input type="text" name="codigo_interno">
</div>

<div class="form-group">
  <input type="file" name="archivo" class="btn btn-subir" id="archivo_subido">
</div>

<div class="form-group">
  <button type="submit" name="guardar" class="btn btn-primary" id="guardar"> Guardar</button>
</div>
</form>
