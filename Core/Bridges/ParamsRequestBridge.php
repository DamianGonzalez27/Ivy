<?php namespace Core\Bridges;

use Symfony\Component\HttpFoundation\Request;

class ParamsRequestBridge
{
    private $data;

    private $files;

    public function __construct($data, $files)
    {
        $this->data = $data;

        $this->files = $files;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getParam($paramName)
    {
        return $this->data[$paramName];
    }

    public function getFiles()
    {
        return $this->files;
    }

    public function getFile($fileName)
    {
        return $this->files->get($fileName);
    }
}