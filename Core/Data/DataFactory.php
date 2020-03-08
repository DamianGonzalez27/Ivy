<?php namespace Core\Data;

class DataFactory
{
    private $data;

    public function __construct($simpleData)
    {
        $this->data = $this->convertToCollection($simpleData);
    }

    public function getData()
    {
        return $this->data;
    }


    private function convertToCollection($simpleData)
    {

    }
}