<?php namespace App;

use App\Interfaces\FactoryEndpointsInterface;
use App\Objects\UserActions;

class FactoryEndpoints implements FactoryEndpointsInterface
{
    /**
     * @author DamianDev <damian27goa@gmail.com>
     * 
     * Esta es la clase fabrica, la responsabilidad que tiene es la de retornar una instancia de 
     * las clases endpoint que creamos.
     * 
     * El arreglo endpoints nos ayuda a validar que los endpoints al momento de validar la peticion 
     * Request existan.
     * 
     * Cada nuevo Endpoint debe ser registrado en el arreglo de endpoints y en la interfaz
     */
    public $endpoints = [
        'UserActions' => true
    ];
    
    public function UserActions($validator)
    {
        return new UserActions($validator);
    }
}