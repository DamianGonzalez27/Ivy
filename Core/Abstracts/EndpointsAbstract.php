<?php namespace Core\Abstracts;

use Doctrine\ORM\EntityManager;
use Core\Bridges\ServicesBridge;
use Core\Bridges\ParamsRequestBridge;

abstract class EndpointsAbstract
{

    private ServicesBridge $serviceBridge;

    private ParamsRequestBridge $requestBridge;

    public EntityManager $entityManager;

    private $filters;

    public $entity;

    public function __construct(ParamsRequestBridge $requestBridge, ServicesBridge $servicesBridge, $filters)
    {
        $this->serviceBridge = $servicesBridge;

        $this->requestBridge = $requestBridge;

        $this->entityManager = getEntityManager();

        $this->entity = $this->entityManager->getRepository($this->modelName);

        $this->filters = $filters;
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

    public function getFilters()
    {
        return $this->filters;
    }
}