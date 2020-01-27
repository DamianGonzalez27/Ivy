<?php namespace Controladores;

class Register
{
    /**
     * @author DamianDev
     * 
     * Clase de registro de controladores y servicios
     */

    public function rutasRegistradas()
    {
        return array
        (
            'MeliController' => 'Controladores\Api\MeliControlador',
            'DamianController' => 'Controladores\Api\DamianControlador'
        );

    }

    public function serviciosRegistrados()
    {
        return array
        (
            'Service' => 'Servicios\Servicio'
        );
    }


}