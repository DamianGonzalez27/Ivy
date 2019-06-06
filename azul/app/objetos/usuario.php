<?php
/*Crearemos las clases para poder manipular la informacion de los usuarios*/

class Usuario {
private $id_usuario;
private $nombre_usuario;
private $apellido_usuario;
private $correo_usuario;
private $nivel_usuario;
private $telefono_usuario;
private $pass_uausrio;
private $fecha_registro;

//Este es el constructor de la clase
public function __construct($id_usuario, $nombre_usuario, $apellido_usuario, $correo_usuario,
                            $nivel_usuario, $fecha_registro, $telefono_usuario, $pass_uausrio){

$this -> id_usuario = $id_usuario;
$this -> nombre_usuario = $nombre_usuario;
$this -> apellido_usuario = $apellido_usuario;
$this -> correo_usuario = $correo_usuario;
$this -> telefono_usuario = $telefono_usuario;
$this -> nivel_usuario = $nivel_usuario;
$this -> pass_usuario = $pass_uausrio;
$this -> fecha_registro = $fecha_registro;

      }


/*Creamos los getters y settesr de la respectiva clase y asi poder acceder a la informacion*/
//Getters
public function getIdUsaurio(){
  return $this -> id_usuario;
}
public function getNombreUsuario(){
  return $this -> nombre_usuario;
}
public function getApellidoUsuario(){
  return $this -> apellido_usuario;
}
public function getCorreoUsuario(){
  return $this -> correo_usuario;
}
public function getTelefonoUsuario(){
  return $this -> telefono_usuario;
}
public function getNivelUsuario(){
  return $this -> nivel_usuario;
}
public function getPassUsuario(){
  return $this -> pass_usuario;
}
public function getFechaRegistro(){
  return $this -> fecha_usuario;
}

//Setters
public function setIdUsuario($id_usuario){
  $this -> id_usuario = $id_usuario;
}
public function setNombreUsuario($nombre_usuario){
  $this -> nombre_usuario = $nombre_usuario;
}
public function setApellidoUsuario($apellido_usuario){
  $this -> apellido_usuario = $apellido_usuario;
}
public function setCorreoUsuario($correo_usuario){
  $this -> correo_usuario = $correo_usuario;
}
public function setTelefonoUsuario($telefono_usuario){
  $this -> telefono_usuario = $telefono_usuario;
}
public function setNivelUsuario($nivel_usuario){
  $this -> nivel_usuario = $nivel_usuario;
}
public function setPassUsuario($pass_uausrio){
  $this -> pass_usuario = $pass_uausrio;
}
public function setFechaRegistro($fecha_registro){
  $this -> fecha_usuario = $fecha_registro;
}
}

 ?>
