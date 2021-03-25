<?php namespace Core\Bridges;

class ServicesBridge
{
    private $servicesCollection;

    public function __construct($servicesCollection)
    {
        $this->servicesCollection = $servicesCollection;
    }

    public function getService($service)
    {
        return $this->servicesCollection[$service];
    }
}