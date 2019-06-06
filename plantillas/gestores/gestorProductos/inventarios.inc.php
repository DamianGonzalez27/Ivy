<div class="panel panel-default panelPrincipal">
  <div class="panel-heading">
<h1 class="panel-title text-center">Inventario</h1>
  </div>
<div class="panel-body">
  <?php
if (count($array_productos) > 0) {
   ?>
  <table class="table table-responsive">
    <thead>
      <tr>
        <th>Id Producto</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Keyword</th>
        <th>Categoria</th>
        <th colspan="2"><i class="fa fa-cogs" aria-hidden="true"></i> Opciones</th>
      </tr>
    </thead>
    <tbody>
<?php
for ($i=0; $i < count($array_productos) ; $i++) {
   $producto_actual = $array_productos[$i][0];
?>
<tr>
  <th><?php echo $producto_actual -> getIdPropducto(); ?></th>
  <th><?php echo $producto_actual -> getNombreProducto(); ?></th>
  <th><?php echo $producto_actual -> getDescripcionProducto(); ?></th>
  <th><?php echo $producto_actual -> getPrecioProducto(); ?></th>
  <th><?php echo $producto_actual -> getKeywordProducto(); ?></th>
  <th><?php
  switch ($producto_actual -> getCategoriaProducto()) {
    case '1':
      echo "Hematologia";
      break;
    case '2':
      echo "Quimica clinica";
      break;
    case '3':
      echo "Serologia";
      break;
    case '4':
      echo "Inmunologia";
      break;
    case '5':
      echo "Equipos de laboratorio";
      break;
    case '6':
      echo "Consumibles";
      break;
  }
   ?></th>
  <th><form method="post" action="<?php echo RUTA_BORRAR_PRODUCTO;?>">
    <input type="hidden" name="id_borrar" value="<?php echo $producto_actual -> getIdPropducto();?>">
  <button type="submit" class="btn btn-danger" name="borrar_producto">Borrar</button>
  </form></th>
  <!--
  <th><form method="post" action="<?php echo RUTA_EDITAR_PRODUCTO;?>">
    <input type="hidden" name="id_editar" value="<?php echo $producto_actual -> getIdPropducto();?>">
  <button type="submit" class="btn btn-primary" name="editar_producto">Editar</button>
  </form></th>
</tr>
-->
<?php
}
 ?>
    </tbody>
  </table>

  <?php
}else{
   ?>
  <h3 class="text-center">Ahun no hay productos que mostrar</h3>
  <a type="submit" class="btn btn-primary form-control" name="guardar" href="<?php echo RUTA_PRODUCTOS_NUEVO;?>"><i class="fa fa-pencil"></i> Ingresa un producto</a>
  <?php
}

   ?>
</div>
</div>
