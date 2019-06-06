<?php
//Incluimos el codigo necesario para la ejecucion de las funciones
include_once 'app/repos/repoUsuario.php';

/*Creamos una clase para validar los datos de inicio de sesion*/
class Login{

private $usuario;
private $error;

//Constructor de la clase de login
public function __construct($correo, $clave, $conexion){
  $this -> error = "";
  if (!$this -> variableIniciada($correo) || !$this -> variableIniciada($clave)) {
    $this -> usuario = null;
    $this -> error = 'Debes ingresar tu contraseña';
  }else{
    $this -> usuario = RepoUsuario::getUserByEmail($conexion, $correo);
    if (is_null($this -> usuario) || !password_verify($clave, $this -> usuario -> getPassUsuario())) {
      $this -> error = 'Los datos son incorrectos';
    }
  }
}
#Creamos una variable auxiliar y comprobamos si esta ha sido iniciaa para usarla en el flujo de datos
  private function variableIniciada($variable){

    if(isset($variable) && !empty($variable)){
      return true;
    }else{
      return false;
    }
return "";
  }

  public function getUsuario(){
    return $this -> usuario;
  }
  public function getError(){
    return $this -> error;
  }
  public function setError(){
    if ($this -> error !== "") {
      echo "<br><div class='alert alert-danger' role='aler'>";
      echo $this -> error;
      echo "</div><br>";
    }
  }

}

 ?>
