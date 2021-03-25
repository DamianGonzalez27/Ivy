<?php namespace Core;

use Core\Validator;
use Core\Genesis;
use League\Plates\Engine;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class Kernel
{
    private Request $request;
    private Engine $templates;

    private $apiParams;

    private $services;

    private $routes;

    /**
     * @author DamianDev <damian27goa@gmail.com>
     * 
     * Clase que inicializa la aplicacion
     */
    public function __construct()
    {
        $this->request = Request::createFromGlobals();

        $this->templates = new Engine('../views');

        $this->templates->loadExtension(new \League\Plates\Extension\URI($_SERVER['SERVER_NAME']));

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
        $validator = new Validator($this->request, $this->routes);

        if(!$validator->validate())
        {
            $response = new Response($this->templates->render('404'), 404);
            $response->send();
        }
        $genesis = new Genesis($validator, $this->templates, $this->apiParams, $this->services);
        
        $genesis->response()->send();
    }
}
