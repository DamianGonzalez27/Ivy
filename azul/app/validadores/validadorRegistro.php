<?php
include_once 'validador.php';
/*Esta es una clase con la que validaremos los datos de registro del usuario*/
class ValidadorRegistro extends Validador{
//Creamos un constructor para poder validar
public function __construct($nombre, $apellido, $correo, $clave1, $clave2, $conexion){
  $this -> nombre = "";
  $this -> apellido = "";
  $this -> correo = "";
  $this -> clave = "";

  //Usamos los validadores de registro
  $this -> errorNombre = $this -> validarNombre($nombre);
  $this -> errorApellido = $this -> validarApellido($apellido);
  $this -> errorCorreo = $this -> validarCorreo($conexion, $correo);
  $this -> errorClave1 = $this -> validarClave($clave1);
  $this -> errorClave2 = $this -> validarClave2($clave1, $clave2);
  if ($this -> errorClave1 === "" && $this -> errorClave2 === "") {
    $this -> clave = $clave1;
  }


  //Inicializamos los mensajes de apertura y cierre de los errores
  $this -> avisoApertura = "<br><div class='alert alert-danger' role='alert'>";
  $this -> avisoCierre = "</div>";
}


}

 ?>
