<?php

class RepoRecuperacion{

public static function verificacionNuevo($conexion, $url_secreta, $usuario){
  $insertado = false;
if (isset($conexion)) {
  try {
$sql = "INSERT INTO autenticar_user(id_autenticacion, usuario_id_usuario, url_autenticar) VALUES('', :usuario, :url)";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':usuario', $usuario, PDO::PARAM_STR);
$sentencia -> bindValue(':url', $url_secreta, PDO::PARAM_STR);
$insertado = $sentencia -> execute();
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
  return $insertado;
}

public static function validarUrl($conexion, $url){
  $usuario = null;
if (isset($conexion)) {
  try {
    $sql = "SELECT a.url_autenticar, ";
    $sql.= "b.id_usuario AS 'user'";
    $sql.= "FROM autenticar_user a INNER JOIN usuario b ";
    $sql.= "WHERE a.url_autenticar = :url AND a.usuario_id_usuario = b.id_usuario";
    $sentencia = $conexion -> prepare($sql);
    $sentencia -> bindValue(':url', $url, PDO::PARAM_STR);
    $sentencia -> execute();
    $resultado = $sentencia -> fetch();
    if (!empty($resultado)) {
      $usuario = $resultado['user'];
    }
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
  return $usuario;
}

}
 ?>
