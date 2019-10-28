<?php namespace Controladores\Api;

class MeliControlador
{
    public function index()
    {
        $response['hola'] = 'Este es un controlador';
        $response['test'] = $this->test();
        return $response;
    }

    private function test()
    {
        return "Esta es la funcion test";
    }
}