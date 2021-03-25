<?php namespace App\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Core\Abstracts\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class PagesController extends AbstractController
{
    public function start()
    {
        return new Response($this->templates->render('start'));
    }

    public function login()
    {
        return new Response($this->templates->render('login'));
    }

    public function home()
    {
        return new Response($this->templates->render('home', [
            'apiData' => API
        ]));
    }

    public function docs()
    {
        //$openapi = \OpenApi\scan('../App/Actions/');

        return new JsonResponse(API, 200);
    }
}