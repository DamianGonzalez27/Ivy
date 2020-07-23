<?php namespace App\Objects;

use Core\Actions\ActionsAbstract;
// use Core\Validators\Validators;

class UserActions extends ActionsAbstract
{

    /**
     * @author DamianDev
     * 
     * 
     * Clase de ejemplo de funcionamiento
     */
    
    public function __construct($validator)
    {
        parent::__construct($validator);
    }
    public function Example()
    {
        $response = [
            'message' => 'Hello world'
        ];
        return $this->run($response);
    }

}