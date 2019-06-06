<?php
include_once 'app/objetos/promociones.php';
include_once 'app/objetos/productos.php';
class RepoPromociones{

  #Esta funcion inserta los productos nuevos en la bd
public static function insertarPromociones($conexion, $promo){
  $promo_insertada = false;
if (isset($conexion)) {
  try {
$sql = "INSERT INTO promociones(id_promociones, nombre_promocion, porcentaje_promocion) VALUES('', :nombre, :porcentaje)";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':nombre', $promo -> getNombrePromocion());
$sentencia -> bindValue(':porcentaje', $promo -> getPorcentajePromocion());
$promo_insertada = $sentencia -> execute();
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
  return $promo_insertada;
}

#Esta funcion manda a llamar todas las promociones que se encuentran en la lista
public static function getPromociones($conexion){
  $promociones = [];
if (isset($conexion)) {
  try {
$sql = "SELECT * FROM promociones";
$sentencia = $conexion -> prepare($sql);
$sentencia -> execute();
$resultado = $sentencia -> fetchAll();
if (count($resultado)) {
  foreach ($resultado as $fila) {
    $promociones[] = array(
       new Promociones(
         $fila['id_promociones'],
         $fila['nombre_promocion'],
         $fila['porcentaje_promocion']
       )
    );
  }
}
  } catch (PDOException $e) {

  }

}
  return $promociones;
}

#con esta funcion se asignan promociones a productos especificos
public static function asignarPromocion($conexion, $producto, $promocion){
$asignacion = false;
if (isset($conexion)) {
  try {
$sql = "INSERT INTO productos_con_promociones(productos_id_producto, promociones_id_promociones) VALUES(:producto, :promocion)";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':producto', $producto, PDO::PARAM_STR);
$sentencia -> bindValue(':promocion', $promocion, PDO::PARAM_STR);
$asignacion = $sentencia -> execute();
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }
}
return $asignacion;
}

public static function getProductosConPromocion($conexion){
  $productos_con_promocion = [];
  if (isset($conexion)) {
    try {
$sql = "SELECT a.productos_id_producto, a.promociones_id_promociones, ";
$sql.= "b.id_producto AS 'id_producto', b.nombre_producto AS 'nombre_producto', b.descripcion_producto AS 'descripcion_producto', b.precio_producto AS 'precio_producto', b.keyword_producto As 'keyword_producto', b.categoria_producto_id_categoria AS 'categoria_producto_id_categoria', b.url_producto AS 'url_producto', b.stock AS 'stock', b.codigo_interno AS 'codigo_interno', ";
$sql.= "c.id_promociones AS 'id_promociones', c.nombre_promocion AS 'nombre_promocion', c.porcentaje_promocion AS 'porcentaje_promocion' ";
$sql.= "FROM productos_con_promociones a INNER JOIN productos b INNER JOIN promociones c ";
$sql.= "WHERE a.productos_id_producto = b.id_producto AND a.promociones_id_promociones = c.id_promociones";
$sentencia = $conexion -> prepare($sql);
$sentencia -> execute();
$resultado = $sentencia -> fetchAll();
if (count($resultado)) {
  foreach ($resultado as $fila) {
    $productos_con_promocion[] = array(
      new Promociones(
        $fila['id_promociones'],
        $fila['nombre_promocion'],
        $fila['porcentaje_promocion']
      ),
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
      )
    );
  }
}
    } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
    }

  }
  return $productos_con_promocion;
}

public static function eliminarProdConPromo($conexion, $producto, $promo){
$producto_eliminado = false;
  if (isset($conexion)) {
    try {
$sql = "DELETE FROM productos_con_promociones WHERE productos_id_producto = :producto AND promociones_id_promociones = :promocion";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':producto', $producto, PDO::PARAM_STR);
$sentencia -> bindValue(':promocion', $promo, PDO::PARAM_STR);
$producto_eliminado = $sentencia -> execute();
    } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
    }

  }
  return $producto_eliminado;
}

public static function eliminarPromo($conexion, $id_promo){
  $promo_eliminada = false;
if (isset($conexion)) {
  try {
$sql = "DELETE FROM promociones WHERE id_promociones = :promocion";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':promocion', $id_promo, PDO::PARAM_STR);
$promo_eliminada = $sentencia -> execute();
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
  return $promo_eliminada;
}

public static function getPromoByProduct($conexion, $produto){
  $promo = [];
if (isset($conexion)) {
  try {
$sql = "SELECT a.productos_id_producto, a.promociones_id_promociones, ";
$sql.= "";
  } catch (PDOException $e) {
print "Error" .$e -> getMessage();
  }

}
  return $promo;
}

}
 ?>
