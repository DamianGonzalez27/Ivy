<?php namespace App\Endpoints;

use Core\Abstracts\EndpointsAbstract;

final class Cliente extends EndpointsAbstract
{
    public function todos()
    {
        return [
            [
                'id' => 1,
                'name' => 'Damian',
                'age' => 28
            ],
            [
                'id' => 2,
                'name' => 'Melisa',
                'age' => 27
            ],
            [
                'id' => 3,
                'name' => 'Ivette',
                'age' => 27
            ]
        ];
    }
}