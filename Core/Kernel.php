<?php namespace Core;

use Core\Validator;
use Core\Genesis;
use Symfony\Component\HttpFoundation\Request;

class Kernel
{
    private $request;
    private $genesis;
    private $response;
    private $validator;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }
    public function run()
    {
        $this->validator = Validator::getValidador($this->request);
        
        if($this->validator->getStatus() == 200)
        {
            $this->genesis = Genesis::getGenesis($this->validator);

            $response = $this->genesis->getResponse();

            $response->getContent();
        }

        $this->validator->setResponse();

        echo $this->validator->getResponse()->getContent();
    }
}