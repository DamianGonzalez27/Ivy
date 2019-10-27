<?php namespace Controladores\Api;

class UsuariosControlador
{
    public function index()
    {
        $response = array(
            "Mensaje" => "Esta es una respuesta desde el controlador de usuarios"
        );
        return json_encode($response, true);
    }
}