<?php namespace Core;

use Core\Validator;
use Core\Genesis;
use Symfony\Component\HttpFoundation\Request;

class Kernel
{
    private $request;
    private $genesis;
    private $response;
    private $validator;

    /**
     * @author DamianDev <damian27goa@gmail.com>
     * 
     * Clase que inicializa la aplicacion
     */
    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }
    /**
     * El metodo Run es el encargado de ejecutar la aplicacion. 
     * 
     * Comienza creando una instancia del metodo validador, el cual tiene la responsabilidad
     * de evaluar las cabeceras y el cuerpo de la peticion recibida. 
     * 
     * Se evalua la clase validador en la primera capa de abstraccion en donde se evalua 
     * un status 200 de la aplicacion, lo cual es un indicador de que la peticion es valida,
     * si la peticion no es valida retorna un Response al cliente con el mensaje de error 
     * en formato JSON y los headers.
     * 
     * Si la peticion es valida se crea una instancia de la clase Genesis la cual es la 
     * clase que se encarga de devolvernos una instancia de response personalizada, dando
     * inicio a la segunda capa de abstraccion.
     * 
     */
    public function run()
    {
        $this->validator = Validator::getValidador($this->request);
        
        if($this->validator->getStatus() == 200)
        {
            $this->genesis = Genesis::getGenesis($this->validator);

            $response = $this->genesis->getResponse();

            $response->getContent();
        }
        else 
        {
            $this->validator->setResponse();

            $this->validator->getResponse()->getContent();
        }
    }
}
