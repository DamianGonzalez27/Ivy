<?php namespace App\Endpoints;

use Core\Abstracts\EndpointsAbstract;

final class User extends EndpointsAbstract
{
    public function me()
    {
        return [
            'id' => 1,
            'name' => 'damian'
        ];
    }
}