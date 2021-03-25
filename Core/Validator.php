<?php namespace Core;

/**
 * Esta clase tiene la responsabilidad de identificar errores en los request
 */
use Symfony\Component\HttpFoundation\Request;

class Validator
{
    private Request $request;

    private $errors = [];

    private $status = 200;

    private $typeResponse = 'json';

    private $method;

    private $path = [];

    private $controller;

    private $function;

    private $access;

    private $routeRules = [];

    private $optionsEndpoint = [];

    private $methodOptions = [];

    protected $routes;

    public function __construct(Request $request, $routes)
    {
        $this->request= $request;

        $this->method = $request->server->get('REQUEST_METHOD');

        $this->path = explode("/", $request->getPathInfo());

        $this->routes = $routes;
    }

    public function validate()
    {
        if($this->path[1] == 'api')
            return true;
        
        ($this->path[1] == "") ? $this->path[1] = "/" : $this->path[1] = $this->path[1];

        if(isset($this->routes[$this->method]['routes'][$this->path[1]]))
            return $this->prepareResponseParams();

        return false;
    }

    public function validateApi($endpoints)
    {
        for($i = 0; $i<count($endpoints); $i++)
        {
            if($endpoints[$i]['name'] == $this->path[2])
                $this->setOptionsEndpoint($endpoints[$i]['options']);
        }

        if(empty($this->getOptionsEndpoint()))
            return $this->prepareApiResponseErrors('Endpoint is not exists');

        if(!isset($this->getOptionsEndpoint()['methods'][$this->request->request->get('_method')]))
            return $this->prepareApiResponseErrors('Method is not exists');
        
        $this->setController(
            $this->getOptionsEndpoint()['class']
        );
        $this->setMethodOptions(
            $this->getOptionsEndpoint()['methods'][$this->request->request->get('_method')]
        );
        return true;
    }

    private function prepareApiResponseErrors($error)
    {
        $this->setErrors(['error' => $error]);

        return false;
    }

    private function prepareResponseParams()
    {   
        $this->setController($this->routes[$this->method]['controller']);
        $this->setFunction($this->routes[$this->method]['routes'][$this->path[1]]['function']);
        $this->setAccess($this->routes[$this->method]['routes'][$this->path[1]]['access']);
        $this->setRouteRules($this->routes[$this->method]['routes'][$this->path[1]]);
        $this->setTypeResponse('html');
        return true;
    }

    /**
     * Get the value of request
     */ 
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set the value of errors
     *
     * @return  self
     */ 
    public function setErrors($errors)
    {
        $this->errors = $errors;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of typeResponse
     */ 
    public function getTypeResponse()
    {
        return $this->typeResponse;
    }

    /**
     * Set the value of typeResponse
     *
     * @return  self
     */ 
    public function setTypeResponse($typeResponse)
    {
        $this->typeResponse = $typeResponse;

        return $this;
    }

    /**
     * Get the value of path
     */ 
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get the value of method
     */ 
    public function getMethod()
    {
        return $this->method;
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
     * Get the value of function
     */ 
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Set the value of function
     *
     * @return  self
     */ 
    public function setFunction($function)
    {
        $this->function = $function;

        return $this;
    }

    /**
     * Get the value of access
     */ 
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set the value of access
     *
     * @return  self
     */ 
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get the value of routeRules
     */ 
    public function getRouteRules()
    {
        return $this->routeRules;
    }

    /**
     * Set the value of routeRules
     *
     * @return  self
     */ 
    public function setRouteRules($routeRules)
    {
        $this->routeRules = $routeRules;

        return $this;
    }

    /**
     * Get the value of optionsEndpoint
     */ 
    public function getOptionsEndpoint()
    {
        return $this->optionsEndpoint;
    }

    /**
     * Set the value of optionsEndpoint
     *
     * @return  self
     */ 
    public function setOptionsEndpoint($optionsEndpoint)
    {
        $this->optionsEndpoint = $optionsEndpoint;

        return $this;
    }

    /**
     * Get the value of methodOptions
     */ 
    public function getMethodOptions()
    {
        return $this->methodOptions;
    }

    /**
     * Set the value of methodOptions
     *
     * @return  self
     */ 
    public function setMethodOptions($methodOptions)
    {
        $this->methodOptions = $methodOptions;

        return $this;
    }
}