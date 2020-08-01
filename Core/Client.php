<?php namespace Core;

use App\FactoryEndpoints;
use App\Objects;

class Client extends FactoryEndpoints
{
    protected $validator;
    protected $factory;

    private $endpoint;
    private $method;
    /**
     * @author DamianDev <damian27goa@gmail.com>
     * 
     * La clase cliente tiene como objetivo realizar la instanciacion y ejecucion del metodo 
     * seleccionado dentro de los headers.
     * 
     * En esta capa de abstraccion se validan las clases o endpoints que se pueden instanciar
     * Se valida que los metodos enviados por el cliente puedan ser invocados
     * En el caso de que ocurra algun error con la peticion se regresa un Request con la descripcion.
     * 
     * En el caso de que no haya ocurrido ningun error se retorna el resultado del metodo solicitado
     */
    public function __construct($validator)
    {
        $this->validator = $validator;
        $this->endpoint = $validator->getEndpoint();
        $this->method = $validator->getMethod();
    }

    public function run()
    {
        $method = $this->getMethod();
        
        $endpoint = $this->endpoint;

        $element = $this->$endpoint($this->validator);

        return $element->$method();
    }

    public function getMethod()
    {
        return $this->method;
    }
    
    
}