<?php namespace Controladores\Api;

use Core\Controladores\Controlador;

class UsuariosControlador extends Controlador
{
    public function index($data)
    {
       
    return $this->run($data);
        
    }
}