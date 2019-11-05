<?php namespace Controladores\Api;

use Core\Controladores\Controlador;

class TestControlador extends Controlador
{
    public function index($data)
    {
       
    return $this->run($data);
        
    }
}