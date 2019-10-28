<?php namespace Controladores\Api;

class MeliControlador
{
    public function index($data)
    {
        $functionName = $data['function'];
        return $this->$functionName();
        
    }

    private function test()
    {
        return $response = array(
            "Test" => "Hola meli :3" 
        );
    }
    
    private function meliFunction()
    {
        return $response = array(
            "hola" => "Esto es un test"
        );
    }
    private function functionTest(){
        
        return $response = array(
            "Test" => "Esto es un test desde la funcion de test"
        );
    }
}