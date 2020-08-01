<?php namespace Core\Models;

use Core\Models\ModelsAbstract;

class User extends ModelsAbstract
{
    protected $table = 'users';

    protected $fillable = [
        'user', 'apikey', 'token', 'passport', 'sesion'
    ];
}