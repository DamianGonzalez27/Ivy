<?php namespace Controladores\Request;

use Core\Requests\Request;


class HomeRequest extends Request
{
    
    public function validarParametros()
    {
        return $this->test;
    }
    
}