<?php namespace Core;

use App\Models\Users;
use App\FactoryEndpoints;
use Core\Validators\UserValidator;
use Core\Actions\UserActions;
use Core\Validators\ParamsValidator;
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
    public $headers = [
        'Content-Type' => 'aplication/Ivy',
        'Access-Control-Allow-Methods' => 'GET, POST, OPTIONS, PATCH, DELETE, PUT',
        'Access-Control-Allow-Origin' => '*'
    ];

    private $response;
    private $error;
    private $request;
    private $errors = [];
    private $params;
    
    protected $apiKey;
    protected $user;
    protected $token;
    protected $method;
    protected $endpoint;
    protected $endpoints;
    protected $status;
    protected $publicMethods;
    protected $validateParamsRulesPath;
    
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
        9 => [
            'key' => 'params-not-valid',
            'error' => 404,
            'legend' => 'Los parametros son incorrectos'

        ],
        10 => [
            'key' => 'no-autentication-params',
            'error' => 404,
            'legend' => 'No existen parametros de autenticacion'
        ],
        11 => [
            'key' => 'replicate-params',
            'error' => 404,
            'legend' => 'La autenticacion no es posible con mas de una forma de autorizacion'
        ],
        12 => [
            'key' => 'token-necesary',
            'error' => 401,
            'legend' => 'Es necesario el uso del parametro token'
        ],
        13 => [
            'key' => 'logout-success',
            'error' => 404,
            'legend' => 'Logout exitoso, hasta pronto'
        ]
    ];

    private function __construct($request)
    {
        $factory = new FactoryEndpoints;
        $this->publicMethods = file_get_contents($factory->publicPath.'PublicMethods/PublicMethods.json');
        $this->validateParamsRulesPath = $factory->publicPath;
        $this->request = $request;
        $this->params = json_decode($request->getContent(), true);
        $this->method = $this->validateIssetFunction($request->headers->all(), 'method');
        $this->endpoint = $this->validateIssetFunction($request->headers->all(), 'endpoint');
        $this->validateInit();
    }


    public static function getValidador($request)
    {
        if(!self::$object)
        {
           return self::$object = new self($request);
        }
        return null;
    }



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



    public function setResponse()
    {
        $this->response = (new Response($this->content, $this->status, $this->headers));
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


    private function validateInit()
    {
        if(!is_null($this->endpoint))
        {
            if($this->endpoint != 'Logout')
            {
                $this->validateStatus();
                $this->validateUser();
                $this->validateStatus();
                $this->validateParams();
                $this->validateStatus();
            }
            else
            {
                $this->validateStatus();
                $this->validateUser();
                $this->validateStatus();
            }
        }
        else
        {
           $this->validateStatus();
        }
    }

    private function validateIssetFunction($headers, $eval)
    {
        if($eval == 'endpoint')
        {
            if(!isset($headers[$eval]))
            {
                $this->content[] = $this->errorList[4];
            }
            else
            {
                if($headers[$eval][0] != 'Logout')
                {
                    $endpoints = json_decode($this->publicMethods, true);
    
                    if(!isset($endpoints[$headers[$eval][0]]))
                    {
                        $this->content[] = $this->errorList[7];
                    }
    
                    return $headers[$eval][0];
                }
                else
                {
                    return $headers[$eval][0]; 
                }
            }                     
        }

        else if(!isset($headers[$eval]))
        {
            if($eval == 'method')
            {
                $this->content[] = $this->errorList[3];
            }
            else if($eval == 'token')
            {
                $this->content[] = $this->errorList[10];
            }
            return null;
        }
        else
        {
            return $headers[$eval][0];
        }

    }
    private function validateUser()
    {

        $headers = $this->request->headers->all();

        if($this->status == 200)
        {
            if($this->endpoint != 'Logout')
            {
                $methods = json_decode($this->publicMethods, true);
                
                if(isset($methods[$this->endpoint]))
                {
                    if(isset($methods[$this->endpoint][$this->method]))
                    {
                        if(!$methods[$this->endpoint][$this->method]['public'])
                        {
                            $this->content[] = $this->errorList[8];
                        }
                        else
                        {
                            if(!$methods[$this->endpoint][$this->method])
                            {
                                if(!isset($headers['user']) && !isset($headers['apikey']))
                                {
                                    if(!isset($headers['token']))
                                    {
                                        $this->content[] = $this->errorList[10];
                                    }
                                    else
                                    {
                                        $this->validateCredentialsUser($headers['token'][0]);
                                    }
                                }
                                else
                                {
                                    if(isset($headers['token']) && (isset($headers['apikey']) or isset($headers['user'])))
                                    {
                                        $this->content[] = $this->errorList[11];
                                    }
                                    else
                                    {
                                        $this->apiKey = $this->validateIssetFunction($headers, 'apikey');
                                        $this->user = $this->validateIssetFunction($headers, 'user');
                            
                                        $this->validateStatus();
                            
                                        if($this->status == 200)
                                        {
                                            $credentials = [
                                                'apikey' => $this->apiKey,
                                                'user' => $this->user
                                            ];
                                            $this->validateCredentialsUser($credentials);
                                        }
                                    }
                                }  
                            }
                        }
                    }
                    else
                    {
                        $this->content[] = $this->errorList[8];    
                    }
                }
                else
                {
                    $this->content[] = $this->errorList[7];
                }
            }
            else
            {

                if(!isset($headers['token']))
                {
                    $this->content[] = $this->errorList[12];
                }
                else
                {
                    $credentials = [
                        'logout' => true,
                        'token' => $headers['token'][0]
                    ];
                    $this->validateCredentialsUser($credentials);
                }
            }
        }
    }
    
    private function validateParams()
    {
        if(count($this->content)<1)
        {
            $paramsRules =  json_decode($this->publicMethods, true);

            if(isset($paramsRules[$this->endpoint][$this->method]))
            {
                $paramsValidator = ParamsValidator::getValidator($this->params);

                $paramsValidator->validate($paramsRules[$this->endpoint][$this->method]);

                if($paramsValidator->status != 200)
                {
                    $this->errorList[9]['error_list'] = $paramsValidator->errors;
                    $this->content[] = $this->errorList[9];
                }
            }
        }
    }
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

    private function validateCredentialsUser($credentials)
    {
        $userValidator = UserValidator::getValidator($credentials);
        
        if($userValidator->status != 200)
        {
            $this->errorList[6]['error_list'] = $userValidator->errors;
            $this->content[] = $this->errorList[6];
        }
        else
        {
            if($this->endpoint != 'Logout')
            {
                $this->headers['token'] = $userValidator->headers;
            }
            else
            {
                $this->content[] = $this->errorList[13];
            }            
        }
    }
}