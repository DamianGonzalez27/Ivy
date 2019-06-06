<?php

include_once 'app/objetos/carrito.php';
include_once 'app/objetos/productos.php';
include_once 'app/objetos/costos.php';

 class RepoCarrito{

   public static function insertarCarrito($conexion, $carrito){
$carrito_insertado = false;
if (isset($conexion)) {
try {
  $sql = "INSERT INTO productos_en_carrito(carrito_id_carrito, cantidad_producto, productos_id_producto) VALUES(:carrito, :cantidad, :producto)";
  $sentencia = $conexion -> prepare($sql);
  $sentencia -> bindValue(':carrito', $carrito -> getIdUsuario(), PDO::PARAM_STR);
  $sentencia -> bindValue(':producto', $carrito -> getProducto(), PDO::PARAM_STR);
  $sentencia -> bindValue(':cantidad', $carrito -> getCantidad(), PDO::PARAM_STR);
  $carrito_insertado = $sentencia -> execute();
} catch (PDOException $e) {
print "Error: ".$e -> getMessage();
}
}
return $carrito_insertado;
   }

   public static function getCostoAdicional($conexion){
     $costo = null;
  if (isset($conexion)) {
    try {
$sql= "SELECT * FROM costos_adicionales";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':producto', $id_producto, PDO::PARAM_STR);
$sentencia -> execute();
$resultado = $sentencia -> fetch();
if (!empty($resultado)) {
  $costo = new Costos(
    $resultado['id_costo'],
    $resultado['nombre_costo'],
    $resultado['costo']
  );
}
    } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
    }

  }
     return $costo;
   }

   public static function getCarritoByIdProducto($conexion, $id_producto, $id_usuario){
     $producto_existe = true;
     if (isset($conexion)) {
       try {
         $sql = "SELECT * FROM productos_en_carrito WHERE productos_id_producto = :producto AND carrito_id_carrito = :usuario";
         $sentencia = $conexion -> prepare($sql);
         $sentencia -> bindValue(':producto', $id_producto, PDO::PARAM_STR);
         $sentencia -> bindValue(':usuario', $id_usuario, PDO::PARAM_STR);
         $sentencia -> execute();
         $resultado = $sentencia -> fetchAll();
         if (count($resultado)) {
           return $producto_existe = true;
         }else {
           return $producto_existe = false;
         }

       } catch (PDOException $e) {
print "Error: ".$e -> getMessage();
       }
     }
     return $producto_existe;
   }

   public static function getCarritoByIdUsuario($conexion, $usuario){
     $carrito_existe = true;
     if (isset($conexion)) {
       try {
$sql = "SELECT * FROM carrito WHERE id_usuario = :usuario";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':usuario', $usuario, PDO::PARAM_STR);
$sentencia -> execute();
$resultado = $sentencia -> fetchAll();
if (count($resultado)) {
  return $carrito_existe = true;
}else {
  return $carrito_existe = false;
}
       } catch (PDOException $e) {
print "Error: ".$e -> getMessage();
       }
     }
   }

   public static function getCantidadProductosCarrito($conexion, $usuario){
     $productos_carrito = null;
     if (isset($conexion)) {
      try {
$conexion -> beginTransaction();
$sql = "SELECT count(*) AS total FROM productos_en_carrito WHERE carrito_id_carrito = :carrito";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':carrito', $usuario, PDO::PARAM_STR);
$sentencia -> execute();
$resultado = $sentencia -> fetch();

$sql2 = "SELECT count(*) AS total_eventos FROM evento_en_carrito WHERE carrito_id_carrito = :usuario";
$sentencia2 = $conexion -> prepare($sql2);
$sentencia2 -> bindValue(':usuario', $usuario, PDO::PARAM_STR);
$sentencia2 -> execute();
$resultado2 = $sentencia2 -> fetch();

  if (!empty($resultado2) || !empty($resultado2)) {
$productos_carrito =  $resultado2['total_eventos'] + $resultado['total'];
  }
  else {
  $productos_carrito = '';
  }
  $conexion -> commit();
      } catch (PDOException $e) {
print "Error: " . $e -> getMessage();
$conexion -> rollBack();
      }
     }
     return $productos_carrito;
   }

   public static function sumarProductoCarrito($conexion, $cantidad, $id_producto, $id_usuario){
     $producto_actualizado = false;
     if (isset($conexion)) {
       try {
         $sql = "UPDATE productos_en_carrito SET cantidad_producto = cantidad_producto + :cantidad WHERE productos_id_producto = :producto AND carrito_id_carrito = :usuario";
         $sentencia = $conexion -> prepare($sql);
         $sentencia -> bindValue(':cantidad', $cantidad, PDO::PARAM_STR);
         $sentencia -> bindValue(':producto', $id_producto, PDO::PARAM_STR);
         $sentencia -> bindValue(':usuario', $id_usuario, PDO::PARAM_STR);
         $producto_actualizado = $sentencia -> execute();
       } catch (PDOException $e) {
         print "Error: " .$e -> getMessage();
       }
     }
     return $producto_actualizado;
   }

   public static function eliminarProductoCarrit($conexion, $id_producto){
     if (isset($conexion)) {
       try {
         $sql = "DELETE FROM carrito WHERE id_producto = :producto";
         $sentencia = $conexion -> prepare($sql);
         $sentencia -> bindValue(':producto', $id_producto, PDO::PARAM_STR);
         $sentencia -> execute();
       } catch (PDOException $e) {
print "Error: ". $e -> getMessage();
       }
     }
   }

   public static function eliminarProductosCarrito($conexion, $id_usuario, $id_producto){
     $producto_eliminado = false;
     if (isset($conexion)) {
       try {
$sql = "DELETE FROM productos_en_carrito WHERE carrito_id_carrito = :usuario AND productos_id_producto = :producto";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':usuario', $id_usuario, PDO::PARAM_STR);
$sentencia -> bindValue(':producto', $id_producto, PDO::PARAM_STR);
$producto_eliminado = $sentencia -> execute();
       } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
       }

     }
     return $producto_eliminado;
   }

   public static function eliminarEventosCarrito($conexion, $id_usuario, $id_evento){
     $evento_eliminado = false;
if (isset($conexion)) {
  try {
$sql = "DELETE FROM evento_en_carrito WHERE carrito_id_carrito = :usuario AND evento_id_evento = :evento";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':usuario', $id_usuario, PDO::PARAM_STR);
$sentencia -> bindValue(':evento', $id_evento, PDO::PARAM_STR);
$resultado = $sentencia -> execute();
if ($resultado) {
  return $evento_eliminado = true;
}else {
  return $evento_eliminado = false;
}
  } catch (PDOException $e) {
print "Error: ".$e -> getMessage();
  }

}
     return $evento_eliminado;
   }

   public static function getProductosCarrito($conexion, $id_usuario){
     $productos = [];
     if (isset($conexion)) {
       try {
$sql = "SELECT a.carrito_id_carrito AS 'id_carrito', a.cantidad_producto AS 'cantidad', a.productos_id_producto AS 'id_producto',";
$sql.= "b.id_producto AS 'producto', b.nombre_producto AS 'nombre', b.descripcion_producto AS 'descripcion', b.precio_producto AS 'precio', b.keyword_producto AS 'keyword', b.categoria_producto_id_categoria AS 'categoria', b.url_producto AS 'url', b.stock AS 'stock', b.codigo_interno AS 'interno'";
$sql.= "FROM productos_en_carrito a INNER JOIN productos b WHERE a.carrito_id_carrito = :usuario AND b.id_producto = a.productos_id_producto";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':usuario', $id_usuario, PDO::PARAM_STR);
$sentencia -> execute();
$resultado = $sentencia -> fetchAll();
if (!empty($resultado)) {
  foreach ($resultado as $fila) {
    $productos[] = array(
      new Producto(
        $fila['producto'],
        $fila['nombre'],
        $fila['descripcion'],
        $fila['precio'],
        $fila['keyword'],
        $fila['categoria'],
        $fila['url'],
        $fila['stock'],
        $fila['interno']
      ),
      $fila['cantidad']
    );
  }
}
       } catch (PDOException $e) {
print "Error: " . $e -> getMessage();
       }

     }
     return $productos;
   }


 }

 ?>
