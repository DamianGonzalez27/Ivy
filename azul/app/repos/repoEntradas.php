<?php
/*Agregamos las librerias necesarias para trabajar*/
include_once 'app/objetos/entrada.php';
include_once 'app/objetos/entradaEscrita.php';

class RepoEntradas{

  public static function InsertarEntradas($conexion, $entradas){

    $entradaInsertada = false;

    if (isset($conexion)) {
      try {

        $sql = "INSERT INTO entradas(id_entrada, usuario_id_usuario, titulo_entrada, url_entrada, cuerpo_entrada, fecha_entrada) VALUES ('', :usuario, :titulo,  :url, :cuerpo, NOW())";
        $sentencia = $conexion -> prepare($sql);

        $sentencia -> bindValue(':titulo', $entradas -> getTituloEntrada(), PDO::PARAM_STR);
        $sentencia -> bindValue(':url', $entradas -> getUrlEntrada(), PDO::PARAM_STR);
        $sentencia -> bindValue(':cuerpo', $entradas -> getCuerpoEntrada(), PDO::PARAM_STR);
        $sentencia -> bindValue(':usuario', $entradas -> getIdUsuario(), PDO::PARAM_STR);

        $entradaInsertada = $sentencia -> execute();

      } catch (PDOException $e) {
        print "Error: " . $e -> getMessage();
      }

    }
    return $entradaInsertada;

  }

  public static function getEntradas($conexion){
 $total_entradas = [];
if (isset($conexion)) {
  try {
  $sql = "SELECT a.id_entrada AS 'id_entrada', a.usuario_id_usuario AS 'usuario_id_usuario', a.titulo_entrada AS 'titulo_entrada', a.url_entrada AS 'url_entrada', a.cuerpo_entrada AS 'cuerpo_entrada', a.fecha_entrada AS 'fecha_entrada', ";
  $sql.= "b.id_usuario, b.nombre_usuario AS 'nombre_usuario', b.apellido_usuario AS 'apellido_usuario'";
  $sql.= "FROM entradas a INNER JOIN usuario b ON b.id_usuario = a.usuario_id_usuario ORDER BY a.id_entrada DESC";
  $sentencia = $conexion -> prepare($sql);
  $sentencia -> execute();
  $resultado = $sentencia -> fetchAll();
    if (count($resultado)) {
      foreach ($resultado as $fila) {
        $total_entradas[] = array(
          new Entrada(
            $fila['id_entrada'],
            $fila['usuario_id_usuario'],
            $fila['titulo_entrada'],
            $fila['url_entrada'],
            $fila['cuerpo_entrada'],
            $fila['fecha_entrada']
          ),
          $fila['nombre_usuario'],
          $fila['apellido_usuario']
        );
      }
    }
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
return $total_entradas;
}



  public static function getEntradasUsuarioByFecha($conexion, $id_usuario){

    $entradas_obtenidas = [];
    if (isset($conexion)) {
      try {
        $sql = "SELECT a.id_entrada, a.titulo_entrada, a.url_entrada, a.cuerpo_entrada, a.fecha_entrada, a.estatus_entrada, a.id_usuario";
        $sql .= "COUNT(b.id_comentario) AS 'comentarios_existentes' FROM entradas a INNER JOIN comentarios b";
        $sql .= "ON a.id_usuario = :autor_id";
        $sentencia = $conexion -> prepare($sql);
        $sentencia -> bindValue(':autor_id', $id_usuario, PDO::PARAM_STR);
        $sentencia -> execute();
        $resultado = $sentencia -> fetchAll();

        if (count($resultado)) {
          foreach ($resultado as $fila) {

            $entradas_obtenidas[] = array(
              new Entrada(
                $fila['id_entrada'],
                $fila['titulo_entrada'],
                $fila['url_entrada'],
                $fila['cuerpo_entrada'],
                $fila['fecha_entrada'],
                $fila['id_usuario']
              ),
              $fila['comentarios_existentes']
            );


          }
        }

      } catch (PDOException $e) {
        print "Error: " . $e -> getMessage();
      }

    }
    return $entradas_obtenidas;
  }

  public static function entradaExistente($conexion, $titulo){
    $entrada_existente = true;
    if (isset($conexion)) {
      try {
        $sql = "SELECT * FROM entradas WHERE titulo_entrada = :titulo";
        $sentencia = $conexion -> prepare($sql);
        $sentencia -> bindValue(':titulo', $titulo, PDO::PARAM_STR);
        $sentencia -> execute();

        $resultado = $sentencia -> fetchAll();
        if (count($resultado)) {
          $entrada_existente = true;
        }
        else{
          $entrada_existente = false;
        }
      } catch (PDOException $e) {
print "Error: " . $e -> getMessage();
      }

    }
    return $entrada_existente;
  }

  public static function getEntradasRecientes($conexion){
$entradas = [];
if (isset($conexion)) {
  try {
    $sql = 'SELECT * FROM entradas ORDER BY fecha_entrada DESC';
    $sentencia = $conexion -> prepare($sql);
    $sentencia -> execute();

    $resultado = $sentencia -> fetchAll();

    if (count($resultado)) {
      foreach ($resultado as $fila) {
        $entradas [] = new Entrada(
          $fila['id_entrada'],
          $fila['titulo_entrada'],
          $fila['url_entrada'],
          $fila['cuerpo_entrada'],
          $fila['fecha_entrada'],
          $fila['id_usuario']
        );
      }
    }
  } catch (PDOException $e) {
  print "Error: " . $e -> getMessage();
  }
return $entradas;
}
  }

public static function getEntradaByUrl($conexion, $url){
  $entrada = null;
  if (isset($conexion)) {
    try {
$sql = "SELECT a.id_entrada AS 'id_entrada', a.usuario_id_usuario AS 'usuario_id_usuario', a.titulo_entrada AS 'titulo_entrada', a.url_entrada AS 'url_entrada', a.cuerpo_entrada AS 'cuerpo_entrada', a.fecha_entrada AS 'fecha_entrada', ";
$sql.= "b.id_usuario, b.nombre_usuario AS 'nombre_usuario', b.apellido_usuario AS 'apellido_usuario' ";
$sql.= "FROM entradas a INNER JOIN usuario b WHERE a.url_entrada = :url AND a.usuario_id_usuario = b.id_usuario";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':url', $url, PDO::PARAM_STR);
$sentencia -> execute();

$resultado = $sentencia -> fetch();
if (!empty($resultado)) {
  $entrada = new EntradaEscrita(
    $resultado['id_entrada'],
    $resultado['usuario_id_usuario'],
    $resultado['titulo_entrada'],
    $resultado['url_entrada'],
    $resultado['cuerpo_entrada'],
    $resultado['fecha_entrada'],
    $resultado['nombre_usuario'],
    $resultado['apellido_usuario']
  );
}
    } catch (PDOException $e) {
print "Error: ".$e -> getMessage();
    }

  }

  return $entrada;
}


public static function getLastId($conexion){
  $last_id = '0';
if (isset($conexion)) {
  try {
$sql = "SELECT MAX(id_entrada) AS id FROM entradas";
$sentencia = $conexion -> prepare($sql);
$sentencia -> execute();
$resultado = $sentencia -> fetch();
if (!empty($resultado)) {
  $last_id = $resultado['id'];
}
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }
}
  return $last_id;
}

public static function eliminarEntradas($conexion, $id_entrada){
  $entrada_eliminada = false;
if (isset($conexion)) {
  try {
$sql = "DELETE FROM entradas WHERE id_entrada = :id";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':id', $id_entrada, PDO::PARAM_STR);
$entrada_eliminada = $sentencia -> execute();
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
  return $entrada_eliminada;
}

}



 ?>
