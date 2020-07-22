<?php namespace Core;

use App\FactoryEndpoints;
use App\Objects;

class Client extends FactoryEndpoints
{
    protected $validator;
    protected $factory;

    private $endpoint;
    private $method;

    public function __construct($validator)
    {
        $this->validator = $validator;
        $this->endpoint = $validator->getEndpoint();
        $this->method = $validator->getMethod();
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function run()
    {
        $method = $this->getMethod();
        
        if(array_key_exists($this->endpoint, $this->endpoints))
        {
            $element = $this->CursosActions($this->validator);
            if(method_exists($element, $method))
            {
                return $element->$method();
            }
            $this->validator->setStatus(404);

            $this->validator->setContent(8);

            $this->validator->setResponse();

            return $this->validator->getResponse();
        }
        else
        {
            $this->validator->setStatus(404);

            $this->validator->setContent(7);
            
            $this->validator->setResponse();

            return $this->validator->getResponse();
        }
    }
    
    
}