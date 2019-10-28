<?php namespace Core;

use Core\Rutas\Ruta as Ruta;

class Kernel
{
    private $ruta;

    public function __construct()
    {
        $this->ruta = $_SERVER['REQUEST_URI'];
    }
    
    public function run($data)
    {
        $controller = $this->evalRuta($this->ruta);
        $response = new $controller;
        return $response->index($data);
        
    }

    private function evalRuta($ruta)
    {
        $rutas = new Ruta;
        return $rutas->run($ruta);
    }

}