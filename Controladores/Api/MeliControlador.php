<?php namespace Controladores\Api;

class MeliControlador
{
    public function index($data)
    {
        $functionName = $data['function'];
        return $this->$functionName();
        
    }

    private function mergeResponse()
    {
        $response['test'] = $this->test();
        $response['meliFunction'] = $this->meliFunction();
        $response['testFunction'] = $this->functionTest();

        return $response;
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