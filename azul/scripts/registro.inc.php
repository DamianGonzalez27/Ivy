<?php
include_once 'app/config.inc.php';
include_once 'app/repos/repoRecuperacion.inc.php';
include_once 'app/repos/repoUsuario.php';
include_once 'app/conexion.inc.php';
include_once 'app/redireccion.inc.php';

class Registro {
  function sa($longitud) {
      $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $numero_caracteres = strlen($caracteres);
      $string_aleatorio = '';

      for ($i = 0; $i < $longitud; $i++) {
          $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
      }

      return $string_aleatorio;
  }

  public function verificar($conexion, $email){
  $enviado = false;
  $email_existe = RepoUsuario::emailExiste($conexion, $email);
    if (isset($conexion) && $email_existe) {
      $caracteres = SELF::sa(10);
      $usuario = RepoUsuario::getUserByEmail($conexion, $email);
      $url = $caracteres . $usuario -> getNombreUsuario();
      $url_secreta = hash('sha256', $url);
      $asunto = "Verifica tu correo";
      $mensaje = "Gracias por registrarte\n Verifica tu correo haciendo click en el siguiente enlace\n";
      $correo_verificacion = "no-reply@azuldiagnostic.com";
Conexion::abrirConexion();
  $insertado = RepoRecuperacion::verificacionNuevo(Conexion::getConexion(), $url_secreta, $usuario -> getIdUsaurio());
  if ($insertado) {
    //$enviado = mail($email, $asunto, $mensaje.$url_secreta, "FROM: $correo_verificacion");
    $enviado = true;
  }
Conexion::cerrarConexion();
    }

  return $enviado;
  }

}

 ?>
