<?php namespace Core\Controladores;

use Core\Kernel;
use Core\Rutas\Ruta;
use Core\Requests\Request;
use Core\Controladores\ErroresControladores;


abstract class Controlador 
{
    private $ruta;
    private $kernel;
    private $request;

    public function __construct()
    {
        $this->ruta = new Ruta;
        $this->kernel = new Kernel;
        $this->request = new Request;
    }
  
    public function run($data)
    {
        
        $clase = $this->kernel->controladores();
        $function = $this->validarFunciones($data, $clase);
        $funcionValidada = $this->validarError($function);
        $datos = $this->validarParametros($data);
        if(is_array($funcionValidada))
        
            return $funcionValidada;
        
        return $clase->$funcionValidada($datos);

    }
    
    private function validarFunciones($data, $clase)
    {
        if(method_exists($clase, $data['function']))

            return $data['function'];

        return array('Error' => '001');
    }

    private function validarError($function)
    {
        if(is_array($function))
        {
            $errores = new ErroresControladores;
            return $errores->getError($function['Error']);
        }
        return $function;
    }

    private function validarParametros($data)
    {
        return $this->request->getData($data);
    }
    






}