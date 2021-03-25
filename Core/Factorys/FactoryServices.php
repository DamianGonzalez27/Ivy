<?php namespace Core\Factorys;

use Core\Interfaces\FactoryInterface;
use Core\Bridges\ServicesBridge;

class FactoryServices implements FactoryInterface
{

    private $services;

    public function __construct($services)
    {
        $this->services = $services;
    }

    public function getFactoryResponse()
    {
        $serviceCollection = [];
        foreach($this->services as $service => $value)
        {
            $serviceClass = $value['class'];
            $construct = $value['construct'];
            $serviceCollection[$service] = new $serviceClass($construct);
        }      

        return new ServicesBridge($serviceCollection);
    }
}