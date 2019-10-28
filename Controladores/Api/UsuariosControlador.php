<?php namespace Controladores\Api;

class UsuariosControlador
{
    public function index()
    {
        $response = array(
            "Mensaje" => "Mensaje enviado desde los usuarios"
        );

        return json_encode($response);
    }
}