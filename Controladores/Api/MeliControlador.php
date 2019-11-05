<?php namespace Controladores\Api;

use Core\Controladores\Controlador;


class MeliControlador extends Controlador
{
    public function index($data)
    {
        return $this->run($data);
    }

    public function mergeResponse($data)
    {
        $response['test'] = $this->test($data['param1']);
        $response['meliFunction'] = $this->meliFunction($data['param2']);
        $response['testFunction'] = $this->functionTest($data['param3']);

        return $response;
    }

    public function test($param)
    {
        return $response = array(
            "Test" => $param 
        );
    }
    
    public function meliFunction($param)
    {
        return $response = array(
            "hola" => $param['param1']
        );
    }
    public function functionTest($param){
        
        return $response = array(
            "Test" => $param
        );
    }
}