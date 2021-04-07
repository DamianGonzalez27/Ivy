<?php namespace Core\Factorys;

use Core\Interfaces\FactoryInterface;
use Core\Bridges\ServicesBridge;
use Core\Bridges\ParamsRequestBridge;

class FactoryEndpoints implements FactoryInterface
{

    private $function;

    private $class;

    public function __construct($function, $class, ParamsRequestBridge $requestBridge, ServicesBridge $servicesBridge, $filters)
    {
        $this->function = $function;

        $this->class = new $class($requestBridge, $servicesBridge, $filters);
    }

    public function getFactoryResponse()
    {
        $function = $this->function;

        return $this->class->$function();
    }
}