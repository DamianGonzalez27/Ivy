<?php namespace Core;

use Core\Client;
use Core\Tokenizer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class Genesis
{

    private Validator $validator;

    private Tokenizer $tokenizer;
    
    private Request $request;

    private $api;

    private $services;

    private $method;

    private $output;

    private $data;

    private $filters;

    private $files;

    private $endpoint;

    private $function;

    private $access;

    private $class;

    private $options;

    private $token;

    public function __construct(Request $request, Tokenizer $tokenizer, $apiParams, $services)
    {
        $this->tokenizer = $tokenizer;

        $this->request = $request;

        $this->token = $request->headers->get('auth');

        $this->path = explode("/", $request->getPathInfo());

        $this->data = json_decode($request->request->get('_data'), true);

        $this->method = $request->request->get('_method');

        $this->output = $request->request->get('_output');

        $this->filters = json_decode($request->request->get('_filters'), true);

        $this->files = $request->files;

        $this->api = $apiParams;
        
        $this->services = $services;

        $this->endpoint = (isset($apiParams['endpoints'][$this->path[1]])) ? $apiParams['endpoints'][$this->path[1]]: null;

        if(!is_null($this->endpoint)){
            $this->class = $apiParams['endpoints'][$this->path[1]]['class'];
            $this->function = (isset($apiParams['endpoints'][$this->path[1]]['methods'][$this->method])) ? $apiParams['endpoints'][$this->path[1]]['methods'][$this->method]['function'] : null;

            if(!is_null($this->function)){
                $this->options = $this->api['endpoints'][$this->path[1]]['methods'][$this->method]; 
                $this->access = $this->api['endpoints'][$this->path[1]]['methods'][$this->method]['permissions'];
            }
        }
    }

    public function execute()
    {
        if(is_null($this->endpoint))
            return new JsonResponse(['_error' =>'Endpoint not found'], 404);

        if(is_null($this->function))
            return new JsonResponse(['_error' =>'Function not found'], 404);

        if($this->access == 'public')
            return $this->clientResponse();

        if(!$this->tokenizer->validateIssetToken())
            return new JsonResponse(['_error' =>'Not access found'], 403);
        
        dd($this->token);
        dd($this->class);
        
    }

    private function clientResponse()
    {
        $validator = new Validator($this->options, $this->data, $this->files, $this->filters, $this->output);

        if(!$validator->validateParams())
            return new JsonResponse($validator->getErrors(), 400);

        $client = new Client(
            $this->function,
            $this->class,
            $this->services,
            $this->data,
            $this->filters,
            $this->files, 
            $this->options
        );

        $client->execute();

        return $client->getClientResponse();
    }
}