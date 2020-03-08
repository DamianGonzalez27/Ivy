<?php namespace Core;


use Core\Client\Client;


class Kernel
{
    private $data;
    private $client;
    private $headers;

    public function __construct()
    {        
        $this->data = json_decode(file_get_contents("php://input"), true);
        $this->client = new Client($this->data);
        $this->headers = getallheaders($data);
    }
    
    public function run()
    {
        //Selector de controladores
        $controller = $this->client->init();
        echo "<pre>";var_dump($controller);
        die();
    }


 
}