<?php namespace App\Models;

use Core\Models\ModelsAbstract;

class User extends ModelsAbstract
{
    public $timestamps = false;

    protected $table = 'usuarios';

    protected $fillable = [
        'id',
        'nombre',
        'apellidos',
    ];

}