<?php namespace Core;

use Core\Client;

class Genesis
{
    private static $object;

    protected $validator;

    private function __construct($validator)
    {
        $this->validator = $validator;
    }

    public static function getGenesis($validator)
    {
        if(!self::$object)
        {
            return self::$object = new self($validator);
        }
        return null;
    }

    public function getResponse()
    {
        $client = new Client($this->validator);
        
        return $client->run();
    }
}