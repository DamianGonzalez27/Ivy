<?php namespace Controladores\Api;

class HomeControlador
{
    public function index()
    {

        $response['saluda'] = $this->saluda();
        $response['despidete'] = $this->despidete();
        $response['test'] = $this->test();

        return $response;
        
    }

    private function saluda()
    {
        return "Hola meli";
    }

    private function despidete()
    {
        return "Adios meli";
    }

    private function test()
    {
        return "Esto es un test";
    }
}