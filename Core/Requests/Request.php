<?php namespace Core\Requests;


class Request
{

    public $data;
    public $test;

    public function __construct($data)
    {
        $this->data = $data;
    }
   
    public function test()
    {
        return $this->data;    
    }

    public function verifyMethod($server)
    {
        switch($_SERVER['REQUEST_METHOD'])
        {
            case 'GET';

                return  false;

            break;

            case 'POST':

                return true;

            break;

            case 'PUT':

                return false;
            
            break;

            case 'DELETE':

                return false;

            break;
        }
    }



}