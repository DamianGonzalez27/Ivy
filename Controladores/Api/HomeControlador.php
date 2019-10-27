<?php namespace Controladores\Api;

class HomeControlador
{
    public function index()
    {
        $response = array(
            "Wellcome" => "Bienvenido a IvyFrame"
        );
        return json_encode($response, true);
    }
}