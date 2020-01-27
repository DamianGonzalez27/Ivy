<?php namespace Core\Modelos;
use BD;

class Modelo
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Mysql();
    }

    public function test()
    {
        return $this->conexion->abrir_conexion();
    }
    
}