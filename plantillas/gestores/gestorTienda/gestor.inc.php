<?php
include_once 'app/repos/repoProductos.php';
include_once 'app/conexion.inc.php';
Conexion::abrirconexion();
#Llamamos a las categorias que se encuentran en la base de datos
$categorias = RepoProductos::getCategoria(Conexion::getConexion());
Conexion::cerrarConexion();
 ?>
  <div class="jumbotron">
    <h1 class="text-center">Tienda digital</h1>
    <div class="row" id="busqueda">

      <div class="col-md-9">
        <form class="" action="<?php echo RUTA_TIENDA;?>" method="post">
        <input type="text" name="busqueda" class="form-control" placeholder="Nombre, marca, etc"><br>
      </div>
      <div class="col-md-1">
        <button class="btn btn-comprar" type="submit" name="buscar">Buscar</button><br>
      </form><br>
      </div>
      <div class="col-md-2">
        <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Categorias <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu" id="categorias">
            <?php
            for ($i=0; $i < count($categorias); $i++) {
            $categoria_actual = $categorias[$i][0];
            ?>
          <form action="<?php echo RUTA_TIENDA;?>" method="post">
            <input type="hidden" name="id_categoria" value="<?php echo $categoria_actual -> getIdCategoria();?>">
            <button type="submit" name="categoria"><li><?php echo $categoria_actual -> getNombreCategoria();?></li></button>
          </form>
            <?php
            }
             ?>
          </ul>
        </div>

      </div>
    </div>
  </div>

<div class="container-fluid">
  <div class="row">


    <div class="col-md-12">
