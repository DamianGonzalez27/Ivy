<?php namespace Core\Abstracts;

use Core\Bridges\ServicesBridge;
use Core\Bridges\RequestBridge;

abstract class EndpointsAbstract
{

    private ServicesBridge $serviceBridge;

    private RequestBridge $requestBridge;

    public function __construct(RequestBridge $requestBridge, ServicesBridge $servicesBridge)
    {
        $this->serviceBridge = $servicesBridge;

        $this->requestBridge = $requestBridge;
    }

    public function getService($service)
    {
        return $this->serviceBridge->getService($service);
    }

    public function getData()
    {
        return $this->requestBridge->getData();
    }

    public function getParam($paramName)
    {
        return $this->requestBridge->getParam($paramName);
    }

    public function getFiles()
    {
        return $this->requestBridge->getFiles();
    }

    public function getFile($fileName)
    {
        return $this->requestBridge->getFile($fileName);
    }
}