<?php
namespace App\Controladores;

class Controlador{

  public function test(){
    return $_POST['test'];
  }
  public function crearAlgo()
  {
    $test = "Esto es una prueba";
    return $test;
  }
}
