<?php namespace App\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Core\Abstracts\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AbstractController
{
    public function login()
    {
        $permisions = json_decode(@file_get_contents('../configs/permissions.json'), true);
        if(!isset($permisions[$this->params['user']]))
            return new JsonResponse(['error' => 'User not exists'], 404);
        if($permisions[$this->params['user']]['pass'] != $this->params['password'])
            return new JsonResponse(['error' => 'Bad credentials'], 404);

        $response = new JsonResponse(['success' => 'welcome'], 200);
        $response->headers->setCookie(Cookie::create('auth', 'test'));
        return $response;
    }

    public function logout()
    {
        $response = new Response();
		$response->headers->setCookie(new Cookie( 'auth',''));
		$response->headers->set( 'Access-Control-Allow-Credentials', 'true' );
		return $response;
    }
}