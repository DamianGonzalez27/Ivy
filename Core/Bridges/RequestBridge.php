<?php namespace Core\Bridges;

use Symfony\Component\HttpFoundation\Request;

class RequestBridge
{
    private $data;

    private $files;

    public function __construct(Request $request)
    {
        $this->data = json_decode($request->request->get('_data'), true);

        $this->files = $request->files;
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