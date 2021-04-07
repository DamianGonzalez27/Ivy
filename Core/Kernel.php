<?php namespace Core;

use Core\Validator;
use Core\Genesis;
use Core\Routes;
use Core\Tokenizer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class Kernel
{
    private Request $request;

    private Tokenizer $tokenizer;

    private $apiParams;

    private $services;

    /**
     * @author DamianDev <damian27goa@gmail.com>
     * 
     * Clase que inicializa la aplicacion
     */
    public function __construct()
    {
        $this->request = Request::createFromGlobals();

        $this->apiParams = json_decode(@\file_get_contents('../configs/api.json'), true);

        $this->services = json_decode(@\file_get_contents('../configs/services.json'), true);

        $this->routes = json_decode(@file_get_contents('../configs/routes.json'), true);
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
        $response = null;

        switch($this->request->server->get('REQUEST_METHOD'))
        {
            case 'GET': 
                $route = new Routes(
                    $this->request, 
                    $this->apiParams
                );

                $response = $route->execute();
            break;

            case 'POST': 
                $genesis = new Genesis(
                    $this->request, 
                    new Tokenizer($this->request),
                    $this->apiParams, 
                    $this->services
                );

                $response = $genesis->execute();
            break;

            default:
                $response = new JsonResponse(['400' => 'Method is not supported'], 400);
            break;
        }

        $response->send();
    }
}
