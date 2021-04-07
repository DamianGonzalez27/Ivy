<?php namespace Core;

use Symfony\Component\HttpFoundation\Request;

class Tokenizer
{

    private Request $request;

    private $token;

    public function __construct(Request $request)
    {
        $this->request = $request;

        $this->token = json_decode(base64_decode($request->headers->get('auth')), true);
    }

    public function validateIssetToken()
    {
        if(is_null($this->token))
            return false;
        return true;
    }

    public function validateTokenInternal()
    {
        if($this->token == "")
            return false;
        return true;
    }
}