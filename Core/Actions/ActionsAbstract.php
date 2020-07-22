<?php namespace Core\Actions;

abstract class ActionsAbstract
{
    public $params;

    public $validator;

    public function __construct($validator)
    {
        $this->validator = $validator;
        $this->params = json_decode($this->validator->getParams(), true);   
    }

    public function run($content)
    {
        $this->validator->setAllContent($content);

        $this->validator->setResponse();

         return $this->validator->getResponse();
    }
}