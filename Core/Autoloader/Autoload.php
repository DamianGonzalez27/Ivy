<?php //namespace Core\Autoloder;

class Autoload
{
    private $carga;
    private $metodo;

    public function __construct($carga)
    {
        $this->carga=$carga;
    }

    public function register($carga)
    {
        spl_autoload_register(function($carga)
        {
            if(file_exists($carga))
            {
                require $carga;
                return true;
            }
            return false;
        });
    }

    public function ruta()
    {

        return $this->obtenerRutaArchivo();
        
    }
    private function obtenerRutaArchivo($carga = null)
    {
        
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $this->carga).'.php';

        return $file;
    }



}