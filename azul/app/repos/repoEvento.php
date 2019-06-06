<?php
include_once 'app/objetos/evento.php';

class RepoEvento{

  public static function insertarParticipantes($conexion, $usuario, $evento){
    $participante = false;
    if (isset($conexion)) {
      try {
        $sql = "INSERT INTO participantesevento (id_participante, id_usuario, id_evento) VALUES('', :usuario, :evento)";
        $sentencia = $conexion -> prepare($sql);
        $sentencia -> bindValue(':usuario', $usuario, PDO::PARAM_STR);
        $sentencia -> bindValue(':evento', $evento, PDO::PARAM_STR);
        $resultado = $sentencia -> execute();

        if ($resultado) {
        return $participante = true;
      }else {
        return $participante = false;
      }
      } catch (PDOException $e) {
        print "Error: " .$e -> getMessage();
      }
    }
    return $participante;
  }


  public static function insertarEventoCarrito($conexion, $id_usuario, $id_evento){
    $evento_insertato = false;
if (isset($conexion)) {
  try {
$sql = "INSERT INTO evento_en_carrito(carrito_id_carrito, evento_id_evento) VALUES(:usuario, :evento)";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':evento', $id_evento, PDO::PARAM_STR);
$sentencia -> bindValue(':usuario', $id_usuario, PDO::PARAM_STR);
$resultado = $sentencia -> execute();
if ($resultado) {
  return $evento_insertato = true;
}else {
  return $evento_insertato = false;
}
  } catch (PDOException $e) {
echo "<script>alert('No es posible comprar mas de una entrada')</script>";
//print "Error: " .$e -> getMessage();
  }
}
    return $evento_insertato;
  }

  public static function getEventosEnCarrito($conexion, $id_usuario){
    $eventos = [];
if (isset($conexion)) {
  try {
$sql = "SELECT a.carrito_id_carrito, a.evento_id_evento, b.id_evento AS 'id_evento', b.nombre_evento AS 'nombre_evento', b.precio_evento AS 'precio_evento', b.fecha_evento AS 'fecha_evento'";
$sql.= "FROM evento_en_carrito a INNER JOIN evento b WHERE a.carrito_id_carrito AND a.evento_id_evento = b.id_evento";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':usuario', $id_usuario, PDO::PARAM_STR);
$sentencia -> execute();
$resultado = $sentencia -> fetchAll();

if (!empty($resultado)) {
  foreach ($resultado as $fila) {
    $eventos [] = array(
      new Evento(
        $fila['id_evento'],
        $fila['nombre_evento'],
        $fila['precio_evento'],
        $fila['fecha_evento']
    )
  );
  }
}
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
    return $eventos;
  }

  public static function getEventos($conexion){
    $eventos = [];
if (isset($conexion)){
  try {
  
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
    return $eventos;
  }
  public static function getEventosAll($conexion){
    $eventos = [];
if (isset($conexion)){
  try {

  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
    return $eventos;
  }


  public static function contarParticipantes($conexion, $evento){
    $participante = null;
    if (isset($conexion)) {
      try {
$sql = "SELECT * FROM eventos_compra WHERE evento_id_evento = :evento";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':evento', $evento, PDO::PARAM_STR);
$sentencia -> execute();
$resultado = $sentencia -> fetchAll();
$participante = count($resultado);
      } catch (PDOException $e) {
  print "Error: " .$e -> getMessage();
      }
    }
    return $participante;
  }

  public static function getEventosComprados($conexion, $id_usuario){
    $eventos = [];
if (isset($conexion)) {
  try {

  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
    return $eventos;
  }

  public static function insertarEventos($conexion, $evento, $domicilio){
    $evento_insertado = false;
if (isset($conexion)) {
  try {
$sql = "INSERT INTO evento(id_evento, nombre_evento, precio_evento, fecha_evento, domicilio_id_domicilio, status_evento) VALUES('', :nombre, :precio, :fecha, :domicilio, 1)";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':nombre', $evento -> getNombreEvento(), PDO::PARAM_STR);
$sentencia -> bindValue(':precio', $evento -> getPrecioEvento(), PDO::PARAM_STR);
$sentencia -> bindValue(':fecha', $evento -> getFechaEvento(), PDO::PARAM_STR);
$sentencia -> bindValue(':domicilio', $domicilio, PDO::PARAM_STR);
$evento_insertado = $sentencia -> execute();
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
    return $evento_insertado;
  }

public static function culminarEvento($conexion, $evento){
  $culminado = false;
if (isset($conexion)) {
  try {
$sql = "UPDATE evento SET status_evento = 0 WHERE id_evento = :evento";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':evento', $evento, PDO::PARAM_STR);
$culminado = $sentencia -> execute();
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
  return $culminado;
}

}
 ?>
