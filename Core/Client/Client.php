<?php namespace Core\Client;

use Core\Factory\FactoryClases;

class Client 
{

    /**
     * @author DamianDev
     * 
     * Clase cliente
     * 
     * Se encarga de crear los metodos y los modelos 
     * 
     * 
     */
    private $method;
    private $params;
    private $factory;

    public function __construct($data)
    {
        //Aqui debemos poner un validador de informacion
        $this->method = $data['method'];
        $this->params = $data['params'];
        $this->factory = new FactoryClases($this->method);
    }

    public function init()
    {
       return $this->factory->getResponse($this->params);
    }
}