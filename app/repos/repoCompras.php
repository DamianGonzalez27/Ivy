<?php
include_once 'app/objetos/compras.php';
include_once 'app/objetos/evento.php';
include_once 'app/objetos/productos.php';
include_once 'app/objetos/domicilio.php';
include_once 'app/objetos/usuario.php';

class RepoCompra{

#Esta funcion nos realiza todas las operaciones de la compra
public static function realizarCompra($conexion, $productos, $eventos, $id_usuario, $domicilio){
$compra = false;
$auxiliar = null;
$controlador = false;
$controlador2 = false;
if (isset($conexion)) {
  try {
    $conexion -> beginTransaction();
    $sql = "INSERT INTO compras(id_compra, carrito_id_carrito, domicilio_id_domicilio,fecha_compras) VALUES('', :carrito, :domicilio, NOW())";
    $sentencia = $conexion -> prepare($sql);
    $sentencia -> bindValue(':carrito', $id_usuario, PDO::PARAM_STR);
    $sentencia -> bindValue(':domicilio', $domicilio, PDO::PARAM_STR);
    $sentencia -> execute();

    $sql2 = "SELECT MAX(id_compra) AS 'id_compra' FROM compras WHERE carrito_id_carrito = :carrito";
    $sentencia2 = $conexion -> prepare($sql2);
    $sentencia2 -> bindValue(':carrito', $id_usuario, PDO::PARAM_STR);
    $sentencia2 -> execute();
    $resultado = $sentencia2 -> fetch();
    if (!empty($resultado)){
      $auxiliar = $resultado['id_compra'];
    }

    if(count($productos)){
      $sql3 = "INSERT INTO productos_compra(productos_id_producto, cantidad, compras_id_compra, status_compra) VALUES(:producto, :cantidad, :compra, 1)";
      $sentencia3 = $conexion -> prepare($sql3);
      $resultado2 = null;
      for ($i=0; $i <count($productos); $i++){
          $producto_actual = $productos[$i][0];
          $cantidad = $productos[$i][1];
          $sentencia3 -> bindValue(':producto', $producto_actual -> getIdPropducto(), PDO::PARAM_STR);
          $sentencia3 -> bindValue(':cantidad', $cantidad, PDO::PARAM_STR);
          $sentencia3 -> bindValue(':compra', $auxiliar, PDO::PARAM_STR);
          $resultado2 = $sentencia3 -> execute();
      }
      $sql4 = "DELETE FROM productos_en_carrito WHERE productos_id_producto = :prod AND carrito_id_carrito = :carrito";
      $sentencia4 = $conexion -> prepare($sql4);
      for ($i=0; $i <count($productos); $i++){
        $producto_a = $productos[$i][0];
        $sentencia4 -> bindValue(':prod', $producto_a -> getIdPropducto(), PDO::PARAM_STR);
        $sentencia4 -> bindValue(':carrito', $id_usuario, PDO::PARAM_STR);
        $sentencia4 ->execute();
      }

if ($resultado2) {
$controlador = true;
}else {
  $controlador = false;
}
    }
    else {
$controlador = true;
    }
    if (count($eventos)) {
      $sql5 = "INSERT INTO eventos_compra(evento_id_evento, compras_id_compra) VALUES (:evento, :compra)";
      $sentencia5 = $conexion -> prepare($sql5);
      $resultado3 = null;
      for ($i=0; $i < count($eventos); $i++) {
        $evento_actual = $eventos[$i][0];
        $sentencia5 -> bindValue(':evento', $evento_actual -> getIdEvento(), PDO::PARAM_STR);
        $sentencia5 -> bindValue(':compra', $auxiliar, PDO::PARAM_STR);
        $resultado3 = $sentencia5 -> execute();

      }
      $sql6 = "DELETE FROM evento_en_carrito WHERE evento_id_evento = :event AND carrito_id_carrito = :user";
      $sentencia6 = $conexion -> prepare($sql6);
      for ($i=0; $i < count($eventos); $i++) {
      $evento_a = $eventos[$i][0];
      $sentencia6 -> bindValue(':event', $evento_actual -> getIdEvento(), PDO::PARAM_STR);
      $sentencia6 -> bindValue(':user', $id_usuario, PDO::PARAM_STR);
      $sentencia6 -> execute();
      }
      if ($resultado3) {
        $controlador2 = true;
      }
    }
    else {
      $controlador2 = true;
    }
    $sql7 = "UPDATE productos SET stock = stock - :cantidad WHERE id_producto = :product";
    $sentencia7 = $conexion -> prepare($sql7);
    for ($i=0; $i < count($productos); $i++) {
    $actualizar = $productos[$i][0];
    $cantidad = $productos[$i][1];
    $sentencia7 -> bindValue(':product', $actualizar -> getIdPropducto(), PDO::PARAM_STR);
    $sentencia7 -> bindValue(':cantidad', $cantidad, PDO::PARAM_STR);
    $sentencia7 -> execute();
    }

    if ($controlador == true && $controlador2 == true) {
    $compra = true;
    }
    $conexion -> commit();
  } catch (PDOException $e) {
  print "Error: " .$e -> getMessage();
$conexion -> rollBack();
  }
}
return $compra;
}

public static function getComprasByIdUser($conexion, $id_usuario, $status){
$compras = [];
if (isset($conexion)) {
  try {

  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
return $compras;
}

#Esta funcion trae todos los productos compraos
public static function getCompras($conexion, $status){
  $compras = [];
if (isset($conexion)) {
  try {

  } catch (PDOException $e) {
print "error: " . $e -> getMessage();
  }

}
  return $compras;
}

#Esta funcion trae todos los datos de la solicitud de factura
public static function getSolicitudFactura($conexion, $status){
  $compras = [];
if (isset($conexion)) {
  try {

  } catch (PDOException $e) {
print "error: " . $e -> getMessage();
  }

}
  return $compras;
}

public static function getPrpductosByCompra($conexion, $id_compra){
  $compra = [];
if (isset($conexion)) {
  try {
$sql = "SELECT a.productos_id_producto, a.cantidad AS 'cantidad', a.compras_id_compra, a.status_compra, ";
$sql.= "b.id_producto AS 'id_producto', b.nombre_producto AS 'nombre_producto', b.descripcion_producto AS 'descripcion_producto', b.precio_producto AS 'precio_producto', b.keyword_producto AS 'keyword_producto', b.categoria_producto_id_categoria AS 'categoria_producto_id_categoria', b.url_producto AS 'url_producto', b.stock AS 'stock', b.codigo_interno AS 'codigo_interno' ";
$sql.= "FROM productos_compra a INNER JOIN productos b WHERE a.compras_id_compra = :compra AND b.id_producto = a.productos_id_producto";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':compra', $id_compra, PDO::PARAM_STR);
$sentencia -> execute();
$resultado = $sentencia -> fetchall();
if (count($resultado)) {
  foreach ($resultado as $fila) {
    $compra[] = array(
      new Producto(
        $fila['id_producto'],
        $fila['nombre_producto'],
        $fila['descripcion_producto'],
        $fila['precio_producto'],
        $fila['keyword_producto'],
        $fila['categoria_producto_id_categoria'],
        $fila['url_producto'],
        $fila['stock'],
        $fila['codigo_interno']
      ),
      $fila['cantidad']
    );
  }
}
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }
}
  return $compra;
}

public static function solicitarFactura($conexion, $id_compra){
  $factura = false;
  if (isset($conexion)) {
    try {
$sql = "UPDATE productos_compra SET status_compra = 4 WHERE compras_id_compra = :compra";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':compra', $id_compra, PDO::PARAM_STR);
$resultado = $sentencia -> execute();

if (!empty($resultado)) {
  return $factura = true;
}else {
  return $factura = false;
}
    } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
    }

  }
  return $factura;
}

public static function enviarPedido($conexion, $id_compra, $status){
  $producto_enviado = false;
if (isset($conexion)) {
  try {
$sql = "UPDATE productos_compra SET status_compra = :status WHERE compras_id_compra = :compra";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':status', $status, PDO::PARAM_STR);
$sentencia -> bindValue(':compra', $id_compra, PDO::PARAM_STR);
$producto_enviado = $sentencia -> execute();

  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
  return $producto_enviado;
}

}
 ?>
