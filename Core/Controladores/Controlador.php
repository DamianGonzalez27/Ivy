<?php namespace Core\Controladores;

use Core\Controladores\Instanciador;
use Core\Controladores\PilaDeClases;
use Core\Controladores\PilaFunciones;

class Controlador 
{

    /**
     * @author DamianDev
     * 
     * Clase de separadora de controladores y parametros
     * 
     * La funcion init es invocada desde el kernel para la separacion de los controladores y 
     * sus respectivos parametros.
     * 
     * Para que se consiga realizar la instancia correctamente es necesario que:
     * 
     * 1.- El nombre de la clase sea el mismo del nombre del documento a instanciar
     * 
     */

    private $coleccionControladores;
    private $pilaDeClases;
    private $instanciador;
    private $pilaFunciones;

    public function __construct($data)
    {
        $this->coleccionControladores = $data['controllers'];
        $this->instanciador = new Instanciador($this->coleccionControladores);
    }

    public function init()
    {
       return $this->instanciador->ejecutor();
    }

    public function __destruct()
    {}
}