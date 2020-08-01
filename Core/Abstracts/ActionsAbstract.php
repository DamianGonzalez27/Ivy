<?php namespace Core\Abstracts;

abstract class ActionsAbstract
{
    public $params;

    public $validator;

    /**
     * @author DamianDev <damian27goa@gmail.com>
     * 
     * Esta clase abstracta tiene la unica responsabilidad de retornar un Response
     * al origen de la aplicacion, configura el contenido del request para mostrarlo 
     * al cliente.
     * 
     * Para el correcto funcionamiento del flujo de informacion es necesario que las clases endpoints 
     * extiendan de esta clase
     */
    public function __construct($validator)
    {
        $this->validator = $validator;
        $this->params = $this->validator->getParams();   
    }

    public function run($content)
    {
        $this->validator->setAllContent($content);

        $this->validator->setResponse();

         return $this->validator->getResponse();
    }
}