<?php namespace Core;

use Core\Rutas\Ruta as Ruta;
use Core\Requests\Request;


class Kernel
{
    private $data;
    //public $request;

    public function __construct()
    {        
        $this->data = json_decode(file_get_contents("php://input"), true);
        //$this->request = new Request($data);
    }
    
    public function run()
    {
        
        $controller = $this->crearControlador();

        echo $this->validarRespuesta($controller);      
        
    }

    private function crearControlador()
    {
        $controller = $this->evalRuta();
        return $response = new $controller;
    }

    private function evalRuta()
    {
        $rutas = new Ruta;
        return $rutas->run();
    }
    
    private function validarRespuesta($response)
    {
       
        if($this->getMethod())
        {
            return json_encode($response->index($this->data));
        }
        else
        {
            return "<h1>404 Not Found</h1>";
        }
    }

    private function getMethod()
    {
        $headers = new Request($this->data);
        return $headers->verifyMethod($_SERVER);
    }



}