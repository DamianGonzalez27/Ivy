<?php namespace Core\Factorys;

use Core\Interfaces\FactoryInterface;
use Core\Bridges\ServicesBridge;
use Core\Bridges\RequestBridge;

class FactoryEndpoints implements FactoryInterface
{

    private $endpoints;

    private $class;

    public function __construct($endpoints, $class, RequestBridge $requestBridge, ServicesBridge $servicesBridge)
    {
        $this->endpoints = $endpoints;

        $this->class = new $class($requestBridge, $servicesBridge);
    }

    public function getFactoryResponse()
    {
        $function = $this->endpoints['function'];

        return $this->class->$function();
    }
}