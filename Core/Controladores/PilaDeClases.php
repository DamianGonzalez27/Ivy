<?php namespace Core\Controladores;

class PilaDeClases
{
    public $pila = [];

    public function push($element, $class)
    {
        $this->pila[$element] = $class;
    }

    public function pluck($controlador, $index)
    {
        return $this->pila[$index];
    }

    public function getPila()
    {
        return $this->pila;
    }

}