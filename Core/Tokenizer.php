<?php namespace Core;

class Tokenizer
{
    public static function getToken($passport)
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
}