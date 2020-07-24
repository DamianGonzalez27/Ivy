<?php namespace Core;

use Symfony\Component\HttpFoundation\JsonResponse as Response;

class Validator
{
    /**
     * @author DamianDev <damian27goa@gmail.com>
     * 
     * Clase validadora de Requests [Singleton]
     * 
     */

    private static $object;
    
    public $content = [];
    public $value = 'aplication/Ivy';

    private $response;
    private $error;
    private $request;
    private $errors = [];
    private $params;
    
    protected $apiKey;
    protected $user;
    protected $method;
    protected $endpoint;
    protected $status;

    protected $paramRequired = [
        'apiKey' => true,
        'user' => true, 
        'method' => true, 
        'endpoint' => true
        ];

    protected $errorList = [
        0 => [
            'key' => 'auth',
            'error' => 200,
            'legend' => 'Aceeso autorizado'

        ],
        1 => [
            'key' => 'apiKey',
            'error' => 401,
            'legend' => 'Api-key es requerido'

        ],
        2 => [
            'key' => 'user',
            'error' => 401,
            'legend' => 'User es requerido'

        ],
        3 => [
            'key' => 'method',
            'error' => 401,
            'legend' => 'Method es requerido'

        ],
        4 => [
            'key' => 'endpoint',
            'error' => 401,
            'legend' => 'Endpoint es requerido'

        ],
        5 => [
            'key' => 'user-not-exist',
            'error' => 401,
            'legend' => 'El usuario no existe'

        ],
        6 => [
            'key' => 'not-credentials',
            'error' => 404,
            'legend' => 'Credenciales incorrectas'

        ],
        7 => [
            'key' => 'endpoint-not-exists',
            'error' => 404,
            'legend' => 'El endpoint no existe'

        ],
        8 => [
            'key' => 'method-not-exists',
            'error' => 404,
            'legend' => 'El method no existe'

        ],
    ];

    private function __construct($request)
    {
        $this->request = $request;
        $this->params = $request->getContent();
        $this->apiKey = $this->validateIssetFunction($request->headers->all(), 'apikey');
        $this->user = $this->validateIssetFunction($request->headers->all(), 'user');
        $this->method = $this->validateIssetFunction($request->headers->all(), 'method');
        $this->endpoint = $this->validateIssetFunction($request->headers->all(), 'endpoint');
        $this->validateStatus();
        
    }

    // Metodo de invocacion de la clase
    public static function getValidador($request)
    {
        if(!self::$object)
        {
           return self::$object = new self($request);
        }
        return null;
    }

    // Metodos getters de la aplicacion

    public function getRequest()
    {
        return $this->request;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getResponse()
    {
        return $this->response->send();
    }
    public function getEndpoint()
    {
        return $this->endpoint;
    }
    public function getMethod()
    {
        return $this->method;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getParams()
    {
        return $this->params;
    }

    // Metodos setters de la aplicacion
    public function setResponse()
    {
        $this->response = (new Response($this->content, $this->status, ['Content-Type' => $this->value]));
    }
    public function setContent($content)
    {
        $this->content = $this->errorList[$content];
    }
    public function setAllContent($content)
    {
        $this->content = $content;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    private function validateIssetFunction($headers, $eval)
    {
        if(!isset($headers[$eval]))
        {
            switch($eval)
            {
                case 'api-key':
                    $this->content[] = $this->errorList[1];
                break;

                case  'user':
                    $this->content[] = $this->errorList[2];
                break;

                case 'method':
                    $this->content[] = $this->errorList[3];
                break;

                case 'endpoint':
                    $this->content[] = $this->errorList[4];
                break;
            }   
            return null;            
        }
        return $headers[$eval][0];

    }
    
    // Metodo de creacion de respuestas
    private function makeResponse()
    {
        return (new Response($this->content, $this->status, ['Content-type' => 'melisa/aplication']));
    }

    // Metodos validadores
    private function validateParams()
    {
        foreach($this->paramRequired as $param)
        {
            if(is_null($this->$param))
            {
                $this->content[] = $this->checkContent($param);
            }
        }
    }
    /*
    private function validateUser()
    {
        $user = User::where('name', $this->user)->first();

        if(is_null($user))
        {
            $this->content[] = $this->checkContent('user-not-exist');
        }
        else
        {
            if($user->password != $this->apiKey)
            {
                $this->content[] = $this->checkContent('not-credentials');
            }
            else
            {
                $this->content[] = $this->checkContent('auth');
            }
        }
    }*/
    private function validateStatus()
    {
        if(count($this->content) >= 1)
        {
            $this->status = $this->content[0]['error'];
        }
        else
        {
            $this->status = 200;
        }
    }

    private function checkContent($key)
    {
        for($i = 0; $i<count($this->errorList); $i++)
        {
            if($this->errorList[$i]['key'] == $key)
            {
                return $this->errorList[$i];
            }
        }
        
    }
}