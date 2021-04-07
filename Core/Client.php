<?php namespace Core;

use Core\Factorys\FactoryServices;
use Core\Factorys\FactoryEndpoints;
use Core\Bridges\ParamsRequestBridge;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Client
{
    private $function;

    private $class;

    private $services;

    private $data;

    private $filters;

    private $files;

    private $paramsBridge;

    private $servicesBridge;

    private $factoryEndpointResponse;

    private $clientResponse;

    private $options;
    
    public function __construct($function, $class, $services, $data, $filters, $files, $options)
    {
        $this->function = $function;

        $this->class = $class;

        $this->services = $services;

        $this->data = $data;

        $this->filters = $filters;

        $this->files = $files;

        $this->options = $options;
    }

    /**
     * Esta función tiene la responsabilidad de preparar una respuesta
     *
     * @return void
     */
    public function execute()
    {
        $this->makeParamsRequestBridge();
        
        $this->makeServices();

        $this->makeEndpoint();

        $this->makeResponse();
    }

    private function makeResponse()
    {   
        if(isset($this->factoryEndpointResponse['_data']))
            $this->clientResponse = new JsonResponse([
                '_totalItems' => count($this->factoryEndpointResponse['_data']),
                '_data' => $this->factoryEndpointResponse['_data']
            ], 200);
    }

    private function makeParamsRequestBridge()
    {
        $this->paramsBridge = new ParamsRequestBridge($this->data, $this->files);
    }
    
    private function makeServices()
    {
        $services = new FactoryServices($this->services);

        $this->servicesBridge = $services->getFactoryResponse();
    }

    private function makeEndpoint()
    {
        $factoryEndpoint = new FactoryEndpoints($this->function, $this->class, $this->paramsBridge, $this->servicesBridge, $this->filters);

        $this->factoryEndpointResponse = $factoryEndpoint->getFactoryResponse();
    }

    /**
     * Get the value of clientResponse
     */ 
    public function getClientResponse()
    {
        return $this->clientResponse;
    }
}