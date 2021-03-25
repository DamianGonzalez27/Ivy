<?php namespace Core;

use Core\Tokenizer;
use Core\Bridges\RequestBridge;
use Core\Factorys\FactoryEndpoints;
use Core\Factorys\FactoryServices;
use Symfony\Component\HttpFoundation\Request;
class Client
{

    private Tokenizer $tokenizer;

    private $endpoints;

    private Request $request;

    private $statusResponse;

    private $controller;

    private $response;

    private $clientResponse;

    private $factoryEndpointResponse;

    private $services;

    private $servicesBridge;

    private $requestBridge;
    
    public function __construct($endpoints, $controller,  Tokenizer $tokenizer, $services)
    {
        $this->endpoints = $endpoints;

        $this->controller = $controller;

        $this->tokenizer = $tokenizer;

        $this->request = $tokenizer->getRequest();

        $this->services = $services;
    }

    /**
     * Esta funcion tiene la responsabilidad de preparar una respuesta
     *
     * @return void
     */
    public function execute()
    {
        $this->makeRequestBridge();
        $this->makeServices();
        $this->makeEndpoint();
        dd($this->factoryEndpointResponse);
    }
    
    private function makeServices()
    {
        $services = new FactoryServices($this->services);

        $this->servicesBridge = $services->getFactoryResponse();
    }

    private function makeEndpoint()
    {
        $factoryEndpoint = new FactoryEndpoints($this->endpoints, $this->controller, $this->requestBridge, $this->servicesBridge);

        $this->factoryEndpointResponse = $factoryEndpoint->getFactoryResponse();
    }

    private function makeRequestBridge()
    {
        $this->requestBridge = new RequestBridge($this->request);
    }

    private function filterResponse()
    {
        
    }

    /**
     * Get the value of statusResponse
     */ 
    public function getStatusResponse()
    {
        return $this->statusResponse;
    }

    /**
     * Get the value of controller
     */ 
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set the value of controller
     *
     * @return  self
     */ 
    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Get the value of response
     */ 
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Get the value of clientResponse
     */ 
    public function getClientResponse()
    {
        return $this->clientResponse;
    }

    /**
     * Set the value of clientResponse
     *
     * @return  self
     */ 
    public function setClientResponse($clientResponse)
    {
        $this->clientResponse = $clientResponse;

        return $this;
    }
}