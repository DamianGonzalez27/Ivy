<?php
include_once 'app/objetos/productos.php';
include_once 'app/objetos/evento.php';
include_once 'app/objetos/categorias.php';

class RepoProductos{

public static function insertarProducto($conexion, $productos){
$producto_insertado = false;
if (isset($conexion)) {
  try {
$sql = "INSERT INTO productos(id_producto, nombre_producto, descripcion_producto, precio_producto, keyword_producto, categoria_producto_id_categoria, url_producto, stock, codigo_interno) VALUES('', :nombre, :descripcion, :precio, :keyword, :categoria, :url, :stock, :interno)";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':nombre', $productos -> getNombreProducto(), PDO::PARAM_STR);
$sentencia -> bindValue(':descripcion', $productos -> getDescripcionProducto(), PDO::PARAM_STR);
$sentencia -> bindValue(':precio', $productos -> getPrecioProducto(), PDO::PARAM_STR);
$sentencia -> bindValue(':keyword', $productos -> getKeywordProducto(), PDO::PARAM_STR);
$sentencia -> bindValue(':categoria', $productos -> getCategoriaProducto(), PDO::PARAM_STR);
$sentencia -> bindValue(':url', $productos -> getUrlProducto(), PDO::PARAM_STR);
$sentencia -> bindValue(':stock', $productos -> getStock(), PDO::PARAM_STR);
$sentencia -> bindValue(':interno', $productos -> getCodigoInterno(), PDO::PARAM_STR);
$producto_insertado = $sentencia -> execute();
  } catch (PDOException $e) {
print "Error: ".$e -> getMessage();
  }
}
return $producto_insertado;
}

public static function getLastId($conexion){
  $last_id = '0';
  if (isset($conexion)) {
    try {
$sql = "SELECT MAX(id_producto) AS id FROM productos";
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


public static function getTodosProductosTienda($conexion){
  $productos = [];
  if (isset($conexion)) {
    try {
  $sql = 'SELECT * FROM productos ORDER BY id_producto DESC ';
  $sentencia = $conexion -> prepare($sql);
  $sentencia -> execute();
  $resultado = $sentencia -> fetchAll();
  if (count($resultado)) {
  foreach ($resultado as $fila) {
    $productos [] = new Producto(
        $fila['id_producto'],
        $fila['nombre_producto'],
        $fila['descripcion_producto'],
        $fila['precio_producto'],
        $fila['keyword_producto'],
        $fila['categoria_producto_id_categoria'],
        $fila['url_producto'],
        $fila['stock'],
        $fila['codigo_interno']

    );
  }
  }
    } catch (PDOException $e) {
  print "Error: ".$e -> getMessage();
    }
  return $productos;
  }
}

public static function getTodosProductos($conexion){
$productos = [];
if (isset($conexion)) {
  try {
$sql = "SELECT * FROM productos";
$sentencia = $conexion -> prepare($sql);
$sentencia -> execute();
$resultado = $sentencia -> fetchAll();
if (count($resultado)) {
  foreach ($resultado as $fila) {
    $productos[] = array(
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
print"Error: ". $e -> getMessage();
  }

}
return $productos;
}


public static function getProductosByUrl($conexion, $url){
  $productos = null;
  if (isset($conexion)) {
    try {
      $sql = 'SELECT * FROM productos WHERE url_producto = :url';
      $sentencia = $conexion -> prepare($sql);
      $sentencia -> bindValue(':url', $url, PDO::PARAM_STR);
      $sentencia -> execute();
      $resultado = $sentencia -> fetch();
      if (!empty($resultado)) {
          $productos = new Producto(
            $resultado['id_producto'],
            $resultado['nombre_producto'],
            $resultado['descripcion_producto'],
            $resultado['precio_producto'],
            $resultado['keyword_producto'],
            $resultado['categoria_producto_id_categoria'],
            $resultado['url_producto'],
            $resultado['stock'],
            $resultado['codigo_interno']
          );
      }
    } catch (PDOException $e) {

    }
  }
  return $productos;
}

#
public static function editarProducto($conexion, $id_producto, $precio, $keyword, $stock){
$producto_actualizado = false;
if (isset($conexion)) {
  try {
$sql = "UPDATE productos SET precio_producto = :precio, keyword_producto = :palabra, stock = :stock WHERE id_producto = :id_producto";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':precio', $precio, PDO::PARAM_STR);
$sentencia -> bindValue(':palabra', $keyword, PDO::PARAM_STR);
$sentencia -> bindValue(':stock', $stock, PDO::PARAM_STR);
$sentencia -> bindValue(':id_producto', $id_producto, PDO::PARAM_STR);
$producto_actualizado = $sentencia -> execute();
  } catch (PDOException $e) {
print "Error: ".$e -> getMessage();
  }
}
return $producto_actualizado;
}

public static function getProductosById($conexion , $id_producto){
  $productos = null;
  if (isset($conexion)) {
    try {
$sql = 'SELECT * FROM productos WHERE id_producto = :id';
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':id', $id_producto, PDO::PARAM_STR);
$sentencia -> execute();
$resultado = $sentencia -> fetch();
if (!empty($resultado)) {
    $productos = new Producto(
      $fila['id_producto'],
      $fila['nombre_producto'],
      $fila['descripcion_producto'],
      $fila['precio_producto'],
      $fila['keyword_producto'],
      $fila['categoria_producto_id_categoria'],
      $fila['url_producto'],
      $fila['stock'],
      $fila['codigo_interno']
  );
}
    } catch (PDOException $e) {
print "Error: ".$e -> getMessage();
    }
  }
  return $productos;
}

public static function getProductosCategoria($conexion, $categoria){
  $productos = [];
  if (isset($conexion)) {
    try {
$sql = "SELECT * FROM productos WHERE categoria_producto_id_categoria = :categoria";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':categoria', $categoria, PDO::PARAM_STR);
$sentencia -> execute();
$resultado = $sentencia -> fetchAll();
if (!empty($resultado)) {
  foreach ($resultado as $fila) {
    $productos[] = new Producto(
      $fila['id_producto'],
      $fila['nombre_producto'],
      $fila['descripcion_producto'],
      $fila['precio_producto'],
      $fila['keyword_producto'],
      $fila['categoria_producto_id_categoria'],
      $fila['url_producto'],
      $fila['stock'],
      $fila['codigo_interno']
    );
  }
}
    } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
    }
  }
  return $productos;
}

public static function getCategoriaById($conexion, $id_categoria){
  $categoria = null;
if (isset($conexion)) {
try {
  $sql = "SELECT * FROM categoria_producto WHERE id_categoria = :categoria";
  $sentencia = $conexion -> prepare($sql);
  $sentencia -> bindValue(':categoria', $id_categoria, PDO::PARAM_STR);
  $sentencia -> execute();
  $resultado = $sentencia -> fetch();
  if (!empty($resultado)) {
      $categoria = new Categorias(
        $resultado['id_categoria'],
        $resultado['nombre_categoria']
      );
  }
} catch (PDOException $e) {
print "Error: " .$e -> getMessage();
}
  return $categoria;
}
}

public static function getProductosBusqueda($conexion, $busqueda){
  $productos = [];
  if (isset($conexion)) {
    try {
  $sql = 'SELECT * FROM productos WHERE nombre_producto LIKE :busqueda OR descripcion_producto LIKE :busqueda ORDER BY id_producto DESC';
  $sentencia = $conexion -> prepare($sql);
  $sentencia -> bindValue(':busqueda', "%".$busqueda."%", PDO::PARAM_STR);
  $sentencia -> execute();
  $resultado = $sentencia -> fetchAll();
  if (count($resultado)) {
  foreach ($resultado as $fila) {
    $productos [] = new Producto(
      $fila['id_producto'],
      $fila['nombre_producto'],
      $fila['descripcion_producto'],
      $fila['precio_producto'],
      $fila['keyword_producto'],
      $fila['categoria_producto_id_categoria'],
      $fila['url_producto'],
      $fila['stock'],
      $fila['codigo_interno']
    );
  }
  }
    } catch (PDOException $e) {
  print "Error: ".$e -> getMessage();
    }
  return $productos;
  }
}

    public static function getProductosAlAzar($conexion, $limite, $categoria) {
    	$productos = [];
    	if (isset($conexion)) {
    		try {
    			$sql = "SELECT * FROM productos WHERE categoria_producto_id_categoria = :categoria ORDER BY RAND() LIMIT $limite";
    			$sentencia = $conexion -> prepare($sql);
          $sentencia -> bindValue(':categoria', $categoria, PDO::PARAM_STR);
    			$sentencia -> execute();
    			$resultado = $sentencia -> fetchAll();
    			if (count($resultado)) {
    				foreach ($resultado as $fila) {
    					$productos[] = new Producto(
                $fila['id_producto'],
                $fila['nombre_producto'],
                $fila['descripcion_producto'],
                $fila['precio_producto'],
                $fila['keyword_producto'],
                $fila['categoria_producto_id_categoria'],
                $fila['url_producto'],
                $fila['stock'],
                $fila['codigo_interno']
    					);
    				}
    			}
    		} catch (PDOException $ex) {
    			print 'ERROR' . $ex -> getMessage();
    		}
    	}

    	return $productos;
    }

/*Con este metodo mandamos a traer las categorias que se pueden crear en la pagina web*/
    public static function getCategoria($conexion){
      $categoria = [];
      if (isset($conexion)) {
        try {
$sql = "SELECT * FROM categoria_producto";
$sentencia = $conexion -> prepare($sql);
$sentencia -> execute();

$resultado = $sentencia -> fetchAll();
if (!empty($resultado)) {
  foreach ($resultado as $fila) {
    $categoria[] = array(
      new Categorias(
        $fila['id_categoria'],
        $fila['nombre_categoria']
      )
    );
  }
}

        } catch (PDOException $e) {
print "Error: " . $e -> getMessage();
        }

      }
      return $categoria;
    }


/*Con este metodo insertamos las nuevas categorias de la pagina web*/
public static function insertarCategoria($conexion, $categoria){
$categoria_insertada = false;
if (isset($conexion)) {
  try {
$sql = "INSERT INTO categoria_producto(id_categoria, nombre_categoria) VALUES('', :categoria)";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':categoria', $categoria, PDO::PARAM_STR);
$categoria_insertada = $sentencia -> execute();
  } catch (PDOException $e) {
print "Error: " .$e -> getMessage();
  }

}
return $categoria_insertada;
}

}

 ?>
