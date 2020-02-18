<?php namespace Core\Controladores;

use Controladores\Register;

class Instanciador
{
    public $namespace;
    public $pilaControladores = [];

    private $register;
    private $rutasRegistradas;
    private $coleccionControladores;
    
    private $ejecutor = [];

    public function __construct($coleccionControladores)
    {
        $this->register = new Register;
        $this->rutasRegistradas = $this->register->rutasRegistradas();
        $this->coleccionControladores = $coleccionControladores;
        $this->init();
        
    }

    public function ejecutor()
    {
        return $this->ejecutor;
    }

    private function init()
    {
        for($i = 0; $i < count($this->coleccionControladores); $i++)
        {
            $index = key($this->coleccionControladores[$i]);
            $this->ejecutor[$index] = $this->separadorFunciones($this->coleccionControladores[$i][$index]);
            $this->ejecutor[$index]['Clase'] = $this->instancer($index);
        }
        return;
    }
    //Agregando un comentario
    private function separadorFunciones($funciones)
    {
        $contadorFunciones = [];
        for($i = 0; $i< count($funciones); $i++)
        {
            $index = key($funciones[$i]);
            $contadorFunciones[$index] = $funciones[$i];
        }
        return $contadorFunciones;  
    }

    private function instancer($clase)
    {
        if(array_key_exists($clase, $this->rutasRegistradas))
        {
            return $this->validarInstanciaClase($this->rutasRegistradas[$clase]);
        }
        else
        {
            return "La ruta de la clase " .$clase." no esta registrada";
        }
    }

    private function validarInstanciaClase($clase)
    {
        if(class_exists($clase))
        {
            return new $clase;
        }
        else
        {
            return "La clase ".$clase." no existe";
        }
    }

    private function ejecutarMetodos($controlador)
    {
        
    }

}