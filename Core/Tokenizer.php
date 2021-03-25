<?php namespace Core;

use Symfony\Component\HttpFoundation\Request;

class Tokenizer
{

    private Request $request;

    private $token;

    public function __construct(Request $request)
    {
        $this->request = $request;

        $this->token = (!is_null($request->cookies->get('auth'))) ? $request->cookies->get('auth'): null;
    }

    public function validateTokenInternal()
    {
        if($this->token == "")
            return false;
        return true;
    }

    public function validatePublicAccees()
    {
        if($this->token == "test")
            return false;
        return true;
    }

    public function getToken($passport)
    {
        $token = [
            'passport' => $passport,
            'token_id' => uniqid($passport.'_'.rand(10, 15))
        ];
        $prepareToken = json_encode($token, true);

        return base64_encode($prepareToken);
    }

    public static function untokenizer($token)
    {
        $prepareToken =  base64_decode($token);

        if(json_decode($prepareToken, true))
        {
            return json_decode($prepareToken, true);
        }
        else
        {
           return false; 
        }

    }

    /**
     * Get the value of request
     */ 
    public function getRequest()
    {
        return $this->request;
    }
}