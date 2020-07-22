<?php namespace App;

use App\Interfaces\FactoryEndpointsInterface;
use App\Objects\CursosActions;

class FactoryEndpoints implements FactoryEndpointsInterface
{
    public $endpoints = [
        'CursosActions' => true
    ];

    public function CursosActions($validator)
    {
        return new CursosActions($validator);
    }
}