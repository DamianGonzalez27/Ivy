<?php namespace Core;

use Core\Client;

class Genesis
{
    private static $object;

    protected $validator;

    /**
     * @author DamianDev <damian27goa@gmail.com>
     * 
     * La clase Genesis tiene el unico objetio de instanciar la clase cliente y retornar
     * los resultados obtenidos de ella.
     * 
     * [Singleton]
     * 
     */
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