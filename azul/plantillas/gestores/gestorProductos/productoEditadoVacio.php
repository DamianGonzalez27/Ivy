<div class="form-group">
  <label>Nombre de producto</label>
  <input type="text" name="nombre" class="form-control" <?php echo $producto -> getNombreProducto()?>>
</div>
<div class="form-group">
  <label>Descripcion</label>
  <textarea class="form-control text-justify texto-entrada" name="descripcion"><?php $producto -> getDescripcionProducto();?></textarea>
</div>
<div class="form-group">
  <label>Precio</label>
  <input type="number" name="precio" class="form-control" <?php echo $producto -> getPrecioProducto();?>>
</div>
<div class="form-group">
  <label>Keywords</label>
  <input type="text" name="keyword" class="form-control" <?php echo $producto -> getKeywordProducto();?>>
</div>
<div class="form-group">
  <label>Selecciona la categoria</label><br>
  <select name="categoria">
    <option value="1">Quimica clinica</option>
    <option value="2">Microbiologia</option>
    <option value="3">Parasitologia</option>
    <option value="4">Hematologia</option>
    <option value="5">Serologia</option>
    <option value="6">Inmunologia</option>
    <option value="7">Equipos de laboratorio</option>
    <option value="8">Consumibles</option>
  </select>
   <p class="help-block">Categoria actual: <?php
   switch ($producto -> getCategoriaProducto()) {
   case '1':
     echo "Quimica clinica";
     break;
   case '2':
     echo "Microbiologia";
     break;
   case '3':
     echo "Parasitologia";
     break;
   case '4':
     echo "Hematologia";
     break;
   case '5':
     echo "Serologia";
     break;
   case '6':
     echo "Inmunologia";
     break;
   case '7':
     echo "Equipos de laboratorio";
     break;
   case '8':
     echo "Consumibles";
     break;
   }
   ?>.</p>
</div>
<div class="form-group">
  <input type="submit" class="form-control btn btn-primary" name="editar" value="Editar producto">
</div>
</form>
