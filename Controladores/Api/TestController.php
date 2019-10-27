<?php namespace Controladores;

class TestController
{
    public function index()
    {
        $response = array(
            "Mensaje" => "Esto es un mensaje desde el controlador"
        );
        return json_encode($response, true);
    }
}