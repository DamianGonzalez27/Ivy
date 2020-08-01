<?php namespace Core\Validators;

use Core\Tokenizer;
use Core\Actions\UserActions;

class UserValidator
{
    private static $object;

    protected $token;
    protected $apikey;
    protected $user;
    protected $credentials;

    public $status;
    public $errors = [];
    public $headers = [];

    private $validateUser;

    private function __construct($credentials)
    {
        $this->credentials = $credentials; 
        $this->validateUser = new UserActions;
        $this->validateParams();
    }

    public static function getValidator($credentials)
    {
        if(!self::$object)
        {
            return self::$object = new self($credentials);
        }
        return null;
    }

    private function validateParams()
    {
        if(is_array($this->credentials))
        {
            if(isset($this->credentials['logout']))
            {
                $this->logout($this->credentials['token']);
            }
            else
            {
                $this->validateByApiAndUser();
            }
            
        }
        else
        {
            $this->validateByToken();
        }
    }
    private function validateByToken()
    {   
        $prepareToken = Tokenizer::untokenizer($this->credentials);

        if($prepareToken)
        {
            $validate = $this->validateUser->validateUserByToken($prepareToken);

            if($validate)
            {
                if(isset($validate['token']))
                {
                    $this->headers = $validate['token'];

                    $this->status = 200;
                }
                else
                {
                    $this->errors[] = [
                        'message' => $validate
                    ];
                }
            }
            else
            {
                $this->errors[] = [
                    'message' => 'invalid token'
                ];
            }
        }
        else
        {
            $this->errors[] = [
                'message' => 'invalid token'
            ];
        }
        
    }
    private function validateByApiAndUser()
    {
        $validate = $this->validateUser->validateUserByApiAndUSer($this->credentials);
        
        if($validate)
        {
            if(isset($validate['token']))
            {
                $this->headers = $validate['token'];

                $this->status = 200;
            }
            else
            {
                $this->errors[] = [
                    'message' => $validate
                ];
            }
        }
        else
        {
            $this->errors[] = [
                'message' => 'El usuario no existe'
            ];
        }
    }
    private function logout($token)
    {
        $prepareToken = Tokenizer::untokenizer($token);
        
        if($prepareToken)
        {
            $validate = $this->validateUser->validateUserByToken($prepareToken, true);

            $this->status = 200;
        }
    }
}