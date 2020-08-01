<?php namespace App\Objects;

use App\Validators\ParamsValidator;
use Core\Abstracts\ActionsAbstract;

class InitActions extends ActionsAbstract
{
    public function __construct($validator)
    {
        parent::__construct($validator);
    }

    public function InitMethod()
    {
        $response = [
            'message' => 'Hello world'
        ];

        return $this->run($response);
    }
}