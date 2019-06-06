<?php
include_once 'app/objetos/domicilio.php';
include_once 'app/objetos/codigoPostal.php';
include_once 'app/objetos/estado.php';
include_once 'app/objetos/municipio.php';

class RepoDomicilio{

public static function insertarDomicilioUsuario($conexion, $domicilio){
  $domicilio_insertado = false;
if (isset($conexion)) {
  try {
$sql = "INSERT INTO domicilio(id_domicilio, estado, codigo_postal, municipio, colonia, no_interior, no_exterior, localidad, calle, referencias, usuario_id_usuario)";
$sql.= "VALUES('', :estado, :codigo, :municipio, :colonia, :interior, :exterior, :localidad, :calle, :referencias, :usuario)";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':estado', $domicilio -> getEstadoIdEstado(), PDO::PARAM_STR );
$sentencia -> bindValue(':codigo', $domicilio -> getCodigoPostal(), PDO::PARAM_STR );
$sentencia -> bindValue(':municipio', $domicilio -> getMunicipioIdMunicipio(), PDO::PARAM_STR );
$sentencia -> bindValue(':colonia', $domicilio -> getColonia(), PDO::PARAM_STR );
$sentencia -> bindValue(':interior', $domicilio -> getNoInterior(), PDO::PARAM_STR );
$sentencia -> bindValue(':exterior', $domicilio -> getNoExterior(), PDO::PARAM_STR );
$sentencia -> bindValue(':localidad', $domicilio -> getLocalidad(), PDO::PARAM_STR );
$sentencia -> bindValue(':calle', $domicilio -> getCalle(), PDO::PARAM_STR );
$sentencia -> bindValue(':referencias', $domicilio -> getReferencias(), PDO::PARAM_STR );
$sentencia -> bindValue(':usuario', $domicilio -> getUsuario(), PDO::PARAM_STR );
$domicilio_insertado = $sentencia -> execute();
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
  return $domicilio_insertado;
}

public static function getDomicilioByIdUser($conexion, $id_usuario){
  $domicilio = [];
if (isset($conexion)) {
  try {
$sql = "SELECT * FROM domicilio WHERE usuario_id_usuario = :domicilio";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':domicilio', $id_usuario, PDO::PARAM_STR);
$sentencia -> execute();

$resultado = $sentencia -> fetchAll();

if (count($resultado)) {
  foreach ($resultado as $fila) {
    $domicilio[] = array(
      new Domicilio(
        $fila['id_domicilio'],
        $fila['estado'],
        $fila['codigo_postal'],
        $fila['municipio'],
        $fila['colonia'],
        $fila['no_interior'],
        $fila['no_exterior'],
        $fila['localidad'],
        $fila['calle'],
        $fila['referencias'],
        $fila['usuario_id_usuario']
      )
    );
  }
}
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
  return $domicilio;
}


}
 ?>
