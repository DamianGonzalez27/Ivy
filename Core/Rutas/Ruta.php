<?php namespace Core\Rutas;

use Controladores\Register;

class Ruta
{
    public function run($ruta)
    {
        return $this->retornaRutas($ruta);
    }   

    private function retornaRutas($ruta)
    {
        $rutasRegistradas = $this->rutasRegistradas();
        return $this->evaluarRutas($ruta, $rutasRegistradas);
    }

    private function evaluarRutas($ruta, $rutasRegistradas)
    {
        if(array_key_exists($ruta, $rutasRegistradas))
        
            return $rutasRegistradas[$ruta];
        
        return "No fue posile encontrar la ruta, verifica la clase de configuracion";
        
    }

    private function rutasRegistradas()
    {
        $registrador = new Register;
        return $registrador->rutasRegistradas();
    }
}