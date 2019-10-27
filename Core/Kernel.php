<?php namespace Core;

use Core\Rutas\Ruta as Ruta;

class Kernel
{
    private $ruta;

    public function __construct()
    {
        $this->ruta = $_SERVER['REQUEST_URI'];
    }
    
    public function run()
    {
        if($_POST)
        {
            return $_POST;
        }
        $controller = $this->evalRuta($this->ruta);
        $response = new $controller;
        return $response->index();
        
    }

    private function evalRuta($ruta)
    {
        //return "test";
        $rutas = new Ruta;
        return $rutas->run($ruta);
    }

}