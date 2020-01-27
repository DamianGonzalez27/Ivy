<?php namespace Modelos;
use Core\Modelos;

class Ejemplo 
    //extends Modelo
{
    public function checkConexion()
    {
        //die("fallo");
        //$conexion = $this->test();
        $conexion = true;
        if($conexion)
        {
            return "Conexion exitosa";
        }
        else
        {
            return "Conexion fallida";
        }
    }
}