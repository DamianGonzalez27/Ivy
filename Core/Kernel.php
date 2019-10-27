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
        
        return $this->evalRuta($this->ruta);
        
    }

    private function evalRuta($ruta)
    {
        //return "test";
        $rutas = new Ruta;
        return $rutas->run($ruta);
    }

}