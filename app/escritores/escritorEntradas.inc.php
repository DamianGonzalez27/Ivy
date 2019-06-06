<?php
include_once 'app/conexion.inc.php';
include_once 'app/repos/repoEntradas.php';

class EscritorEntradas{

public static function cortarEntrada($texto){
  $longitud = 400;
  $resultado = '';
  if (strlen($texto) >= $longitud) {
    $resultado = substr($texto, 0 , $longitud);
    $resultado .= '...';
  }else {
    $resultado = $texto;
  }
  return $resultado;
}



  public static function setEntradas($entradas){
    if (count($entradas)) {
      for ($i=0; $i <count($entradas); $i++) {
        $entrada_actual = $entradas[$i][0];
        $nombre_autor = $entradas[$i][1];
        $apellido_autor = $entradas[$i][2];
        ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo $entrada_actual -> getTituloEntrada();?></h3>
          </div>
          <div class="panel-body">
          <div class="row">
            <div class="col-md-8">
              <p>
                <?php
                echo SELF::cortarEntrada($entrada_actual -> getCuerpoEntrada());
                //echo nl2br(SELF::cortarEntrada($entrada -> getCuerpoEntrada()));
                 ?>
              </p>
              <br>
              <p><?php echo $nombre_autor;?></p>
               <br>
                 <br>
            </div>
            <div class="col-md-4">
              <div class="text-right imagen-blog">
                <img src="<?php echo RUTA_IMAGENES_BLOG.$entrada_actual -> getIdEntrada();?>.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-12">
            <div class="text-right">
              <a class="btn btn-primary" type="button" href="<?php echo RUTA_ENTRADA.'/'.$entrada_actual -> getUrlEntrada();?>">Leer más</a>
            </div>
          </div>
          </div>
          </div>
        </div>
        <?php
      }
    }
  }

  public static function setEntradasPanel($entradas){
    if (count($entradas)) {
      for ($i=0; $i <count($entradas); $i++) {
        $entrada_actual = $entradas[$i][0];
        $nombre = $entradas[$i][1];
        $apellido = $entradas[$i][2];
        ?>
<tr>
  <th><?php echo $entrada_actual -> getFechaEntrada();?></th>
  <th><?php echo $entrada_actual -> getTituloEntrada();?></th>
  <th><?php echo $nombre." ".$apellido;?></th>
  <th>
<a class="btn btn-primary" type="button" href="<?php echo RUTA_ENTRADA.'/'.$entrada_actual -> getUrlEntrada();?>">Leer más</a>
  </th>
</tr>
        <?php
      }
    }
  }

}

 ?>
