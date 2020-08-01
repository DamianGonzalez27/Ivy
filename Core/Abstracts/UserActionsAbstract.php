<?php namespace Core\Abstracts;

use Core\Models\User;

abstract class UserActionsAbstract
{
    public function getUserByPassport($passport)
    {
        return User::where('passport', $passport)->first();
    }

    public function getUserByName($user)
    {
        return User::where('user', $user)->first();
    }

    public function createUser($user, $apikey, $token, $passport, $sesion)
    {
       return User::create([
           'user' => $user,
           'apikey' => $apikey,
           'token' => $token,
           'passport' =>  $passport,
           'sesion' => $sesion
       ]); 
    }
}