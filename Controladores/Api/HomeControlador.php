<?php namespace Controladores\Api;

use Core\Controladores\Controlador;

class HomeControlador extends Controlador
{

    public function index($data)
    {
       
    return $this->run($data);
        
    }

    public function saluda()
    {
        return "Hola";
    }

    public function despidete()
    {
        return "Adios";
    }

    public function test()
    {
        return "Esto es un test";
    }
}