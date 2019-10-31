<?php namespace Core;

use Core\Rutas\Ruta as Ruta;

class Kernel
{
    private $data;
    private $headers;
    private $cookies;
    private $session;

    public function __construct()
    {
        
        $this->data = json_decode(file_get_contents("php://input"), true);
    }
    
    public function run()
    {
        $controller = $this->evalRuta();
        $response = new $controller;
        echo json_encode($response->index($this->data));
        
    }

    private function evalRuta()
    {
        $rutas = new Ruta;
        return $rutas->run();
    }
    public function params()
    {
       return $this->data;
    }


}