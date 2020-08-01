<?php namespace Core\Actions;

use Core\Tokenizer;
use Core\Abstracts\UserActionsAbstract;

class UserActions extends UserActionsAbstract
{
    public $errors = [];

    public function validateUserByToken($prepareToken, $logout = null)
    {
        $user = $this->getUserByPassport($prepareToken['passport']);
        if($user)
        {
            $lastToken = Tokenizer::untokenizer($user->token);
            
            if($user->passport != $prepareToken['passport'])
            {
                return false;
            }
            if($lastToken['token_id'] != $prepareToken['token_id'])
            {
                return false;
            }
            if(!is_null($logout))
            {
                $user->sesion = 0;
                $user->token = null;
                $user->save();
                return ['message' => 'Logout exitoso'];
            }
            else
            {
                $user->token = Tokenizer::getToken($user->passport);
                $user->save();
                return ['token' => $user->token];
            }
        }
        else
        {
            return false;
        }
    }

    public function validateUserByApiAndUser($credentials)
    {
        $user = $this->getUserByName($credentials['user']);
        
        if($user)
        {
            if($user->apikey == $credentials['apikey'])
            {
                if($user->sesion == 0)
                {
                    $user->sesion = 1;
                    $user->token = Tokenizer::getToken($user->passport);
                    $user->save();
                    return ['token' => $user->token];
                }
                else 
                {
                    return 'No es posible realizar este tipo de peticion si la sesion se encuentra actualmente abierta';
                }
            }
            else
            {
                return 'Error con las credenciales';
            }
        }
        else
        {
            return false;
        }
    }

    public function createUserWhitSession($user, $apikey, $passport)
    {
        $token = Tokenizer::getToken($passport);
        $prepareUser = hash('md5', $user);
        $prepareApikey = hash('md5', $apikey);

        return $this->createUser($prepareUser, $prepareApikey, $token, $passport, 1);
    }
    public function createUserWhitoutSession($user, $apikey, $passport)
    {
        $prepareUser = hash('md5', $user);
        $prepareApikey = hash('md5', $apikey);

        return $this->createUser($prepareUser, $prepareApikey, null, $passport, 0);
    }
}