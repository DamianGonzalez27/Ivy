<?php namespace Core;

use Core\Client;
use Core\Tokenizer;
use League\Plates\Engine;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class Genesis
{

    private Validator $validator;

    private Engine $templates;

    private Tokenizer $tokenizer;

    private $api;

    private $services;

    public function __construct(Validator $validator, Engine $templates, $apiParams, $services)
    {
        $this->templates = $templates;

        $this->tokenizer = new Tokenizer($validator->getRequest());

        $this->validator = $validator;

        $this->api = $apiParams;
        
        $this->services = $services;
    }

    public function response()
    {
        if(!is_null($this->validator->getFunction()))
            return $this->makeHtmlResponse();

        return $this->makeApiResponse();
    }

    private function makeHtmlResponse()
    {
        if($this->validator->getAccess() == 'private')
            if(!$this->tokenizer->validateTokenInternal())
                return new RedirectResponse('/');
        if($this->validator->getAccess() == 'public')
            if(!$this->tokenizer->validatePublicAccees())
                return new RedirectResponse('/home');

        $controllerClass = $this->validator->getController();
        $function = $this->validator->getFunction();
        $controller = new $controllerClass($this->validator->getRequest(), $this->templates);

        return $controller->$function();
    }

    private function makeApiResponse()
    {
        if($this->validator->getMethod() != 'POST')
            return new JsonResponse(['error' => 'Http method is not supported'], 404);

        if(!isset($this->validator->getPath()[2]))
            return new JsonResponse(['error' => 'Method is not exists'], 404);

        if(!$this->validator->validateApi($this->api['endpoints']))
            return new JsonResponse($this->validator->getErrors(), 404);
        
        $client = new Client(
            $this->validator->getMethodOptions(),
            $this->validator->getController(),
            $this->tokenizer,
            $this->services
        );

        $client->execute();

        return $client->getClientResponse();
    }
}