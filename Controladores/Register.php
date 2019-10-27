<?php namespace Controladores;

class Register
{
    public function rutasRegistradas()
    {
        return $rutasConfig = array(
            '/test' => 'TestController',
            '/usuarios' => 'Controladores\Api\UsuariosControlador'
        );
    }
}