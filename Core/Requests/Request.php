<?php namespace Core\Requests;

class Request
{
    private $data;

    public function __contruct($contenidos)
    {
        $this->data = $contenidos;
    }
    
    public function traerParametros()
    {
        return $this->data;
    }

}