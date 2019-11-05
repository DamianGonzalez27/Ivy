<?php namespace Controladores\Api;

class TestControlador
{
    public function index()
    {
        $response = array(
            "Mensaje" => "Esto es un mensaje desde el controlador de test"
        );
        
        return json_encode($response, true);
    }
}