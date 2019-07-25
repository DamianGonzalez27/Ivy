<?php

namespace App\Conexion;
//Esta es la clase conexion
class Conexion{

  #Declaramos una variable para poder manipular la conexion desde afuera de la misma
  private static $conexion;

#Con este metodo abrimos la conexion con el servidor
public static function abrirConexion(){
  #Verificamos la conexion
  if(!isset(self::$conexion)){
    try {
      include_once 'config.inc.php';
      self::$conexion = new PDO('mysql:host='.NOMBRE_SERVIDOR.'; dbname='.NOMBRE_BASE, NOMBRE_USER, PASS);
      self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      self::$conexion -> exec("SET CHARACTER SEt utf8");

    } catch (PDOException $e) {
      print "Error con la conexion de la base de datos" . $e -> getMessage() . "<br>";
      die();
    }

  }
}
#Con este metodo cerramos la conexion con el servidor
public static function cerrarConexion(){
  if(isset(self::$conexion)){
    self::$conexion = null;
  }
}

#Con este metodo mandamos a llamar la conexion ya que el metodo en si es provado
public static function getConexion(){
  return self::$conexion;
}


}

 ?>
