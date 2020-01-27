<?php namespace Controladores\Api;

class MeliControlador 
{
    
    public function Hola($params)
    {
        return "Hola".$params['param1'];
    }

    public function Adios($params)
    {
        return "Adios".$params["param1"];
    }
}