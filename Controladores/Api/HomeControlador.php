<?php namespace Controladores\Api;

use Controladores\Request\HomeRequest;

class HomeControlador
{
    
    public function index($data)
    {
        
        $response['saluda'] = $this->saluda();
        $response['despidete'] = $this->despidete();
        $response['data'] = $data;

        return $response;
        
    }

    private function saluda()
    {
        return "Hola";
    }

    private function despidete()
    {
        return "Adios";
    }

    private function test()
    {
        return "Esto es un test";
    }
}