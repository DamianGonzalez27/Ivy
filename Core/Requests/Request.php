<?php namespace Core\Requests;


class Request
{
    public function getData($data)
    {
        return $data['params'];
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