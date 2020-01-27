<?php namespace Core\Rutas;

use Controladores\Register;

class Ruta
{
    private $register;
    private $ruta;

    public function __construct()
    {
        $this->register = new Register;
        $this->ruta = $_SERVER['REQUEST_URI'];
    }
   

    public function run()
    {
        return $this->retornaRutas($this->ruta);
    }   

    private function retornaRutas($ruta)
    {
        $rutasRegistradas = $this->rutasRegistradas();         
        return $this->evaluarRutas($ruta, $rutasRegistradas);
       
    }

    private function evaluarRutas($ruta, $rutasRegistradas)
    {
        
        if(array_key_exists($ruta, $rutasRegistradas))
        {
            return $rutasRegistradas[$ruta];
        }
        return Errores::class; 
    }

    private function rutasRegistradas()
    {
        return $this->register->rutasRegistradas();
    }


}