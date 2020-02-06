<?php namespace Core;


use Core\Controladores\Controlador;


class Kernel
{
    private $data;
    private $controlador;

    public function __construct()
    {        
        $this->data = json_decode(file_get_contents("php://input"), true);
        $this->controlador = new Controlador($this->data);

    }
    
    public function run()
    {
        //Selector de controladores
        $controller = $this->controlador->init();
        echo "<pre>";var_dump($controller);
        die();     
        
    }


 
}