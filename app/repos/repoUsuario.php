<?php
include_once 'app/objetos/usuario.php';
class RepoUsuario{
  //Esta funcion nos ayuda a insertar usuarios a la base de datos
  public static function insertarUsuario($conexion, $usuario){
    $usuarioInsertado = false;

    if (isset($conexion)) {
      try {

        $sql = "INSERT INTO usuario(id_usuario, nombre_usuario, apellido_usuario, correo_usuario, nivel_usuario, fecha_registro, telefono_usuario, pass_usuario) VALUES ('', :nombre, :apellido, :correo, :estatus, NOW(), :telefono, :pass)";
        $sentencia = $conexion -> prepare($sql);

        $sentencia -> bindValue(':nombre', $usuario -> getNombreUsuario(), PDO::PARAM_STR);
        $sentencia -> bindValue(':apellido', $usuario -> getApellidoUsuario(), PDO::PARAM_STR);
        $sentencia -> bindValue(':correo', $usuario -> getCorreoUsuario(), PDO::PARAM_STR);
        $sentencia -> bindValue(':telefono', $usuario -> getTelefonoUsuario(),PDO::PARAM_STR);
        $sentencia -> bindValue(':estatus', $usuario -> getNivelUsuario(), PDO::PARAM_STR);
        $sentencia -> bindValue(':pass', $usuario -> getPassUsuario(), PDO::PARAM_STR);

        $usuarioInsertado = $sentencia -> execute();

      } catch (PDOException $e) {
        print "Error: " . $e -> getMessage();
      }

    }
    return $usuarioInsertado;
  }

  public static function emailExiste($conexion, $correo){
    $emailExiste = false;

    if(isset($conexion)){
      try {
        $sql = "SELECT * FROM usuario WHERE correo_usuario = :email";
        $sentencia = $conexion -> prepare($sql);
        $sentencia -> bindValue(':email', $correo, PDO::PARAM_STR);
        $sentencia -> execute();
        $resultado = $sentencia -> fetchAll();

        if(count($resultado)) {
          $emailExiste = true;
        }else{
          $emailExiste = false;
        }

      } catch (PDOException $e) {
        print "Error: " . $e -> getMessage();
      }

    }

    return $emailExiste;
  }

  public static function getUserByEmail($conexion, $email){
    $usuario = null;
    if (isset($conexion)) {
      try {
        $sql = "SELECT * FROM usuario WHERE correo_usuario = :correo";
        $sentencia = $conexion -> prepare($sql);
        $sentencia -> bindValue(':correo', $email, PDO::PARAM_STR);
        $sentencia -> execute();
        $resultado = $sentencia -> fetch();
        if (!empty($resultado)) {
          $usuario = new Usuario(
            $resultado['id_usuario'],
            $resultado['nombre_usuario'],
            $resultado['apellido_usuario'],
            $resultado['correo_usuario'],
            $resultado['nivel_usuario'],
            $resultado['fecha_registro'],
            $resultado['telefono_usuario'],
            $resultado['pass_usuario']
          );
        }
      } catch (PDOException $e) {
        print "Error: " .$e -> getMessage();
      }
    }
    return $usuario;
  }

  public static function getUserById($conexion, $id_usuario){
    $usuario = null;
    if (isset($conexion)) {
      try {
        $sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
        $sentencia = $conexion -> prepare($sql);
        $sentencia -> bindValue(':id_usuario', $id_usuario, PDO::PARAM_STR);
        $sentencia -> execute();

        $resultado = $sentencia -> fetch();
        if (!empty($resultado)) {
          $usuario = new Usuario(
            $resultado['id_usuario'],
            $resultado['nombre_usuario'],
            $resultado['apellido_usuario'],
            $resultado['correo_usuario'],
            $resultado['nivel_usuario'],
            $resultado['fecha_registro'],
            $resultado['telefono_usuario'],
            $resultado['pass_usuario']
          );
        }


      } catch (PDOException $e) {
        print "Error: ".$e -> getMessage();
      }

    }

  return $usuario;
  }

public static function activarUsuario($conexion, $id){
  $activado = false;
if (isset($conexion)) {
  try {
$conexion -> beginTransaction();
$sql = "UPDATE usuario SET nivel_usuario = 2 WHERE id_usuario = :usuario";
$sentencia = $conexion -> prepare($sql);
$sentencia -> bindValue(':usuario', $id, PDO::PARAM_STR);
$resultado = $sentencia -> execute();

$sql2 = "INSERT INTO carrito(id_carrito, usuario_id_usuario) VALUES(:usuario, :usuario2)";
$sentencia2 = $conexion -> prepare($sql2);
$sentencia2 -> bindValue(':usuario', $id, PDO::PARAM_STR);
$sentencia2 -> bindValue(':usuario2', $id, PDO::PARAM_STR);
$resultado2 = $sentencia2 -> execute();

if ($resultado == true && $resultado2 == true) {
  $activado = true;
}

$conexion -> commit();
  } catch (PDOException $e) {
print "Error: ".$e -> getMEssage();
$conexion -> rollBack();
  }

}
  return $activado;
}

}


 ?>
