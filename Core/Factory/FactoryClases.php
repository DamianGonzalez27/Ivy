<?php namespace Core\Factory;

use Core\Interfaces\FactoryInterface;
use Core\Service\Service;

class FactoryClases implements FactoryInterface
{
    private $method;
    private $service;

    public function __construct($method)
    {
        $this->method = $method;
        $this->service = new Service($this->method);
    }

    public function getInstance()
    {

    }

    public function getResponse($params)
    {
        
    }


}