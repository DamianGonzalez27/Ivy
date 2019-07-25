<?php
namespace App\ControlSesion;
//Esta es la clase para validar la sesion del usuario
class ControlSesion{

#Con este metodo creamos la cookie de sesion del usuario
  public static function IniciarSesion($idUsuario, $nombreUsuario, $acceso){
    if(session_id() == ''){
      session_start();
    }
    $_SESSION['id_usuario'] = $idUsuario;
    $_SESSION['nombre_usuario'] = $nombreUsuario;
    $_SESSION['acceso'] = $acceso;
  }

#Con este metodo cerramos la session del usuario
  public static function CerrarSesion(){
    if(session_id() == ''){
      session_start();
    }
    if (isset($_SESSION['id_usuario'])) {
      unset($_SESSION['id_usuario']);
    }
    if (isset($_SESSION['nombre_usuario'])) {
      unset($_SESSION['nombre_usuario']);
    }
    if (isset($_SESSION['acceso'])) {
      unset($_SESSION['acceso']);
    }
    session_destroy();
  }

#Este metodo valida si la sesion ha sido iniciada
  public static function sesionIniciada(){
    if(session_id() == ''){
      session_start();
    }
    if (isset($_SESSION['id_usuario']) && isset($_SESSION['nombre_usuario']) && isset($_SESSION['acceso'])) {
      return true;
    }else{
      return false;
    }

  }


}


 ?>
