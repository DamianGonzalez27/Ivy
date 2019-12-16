<?php namespace Controladores;

class Register
{
    public function rutasRegistradas()
    {
        return $rutasConfig = array(
            '/' => 'Controladores\Api\HomeControlador',
            '/test' => 'Controladores\Api\TestControlador',
            '/usuarios' => 'Controladores\Api\UsuariosControlador',
            '/meli' => 'Controladores\Api\MeliControlador'
        );
    }

    public function requestRegister()
    {
        return $requestRegister = array(
            'HomeRequest' => 'Controladores\Request\Request'
        );
    }

}