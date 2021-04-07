<?php namespace App;

class CustomValidator
{
    private $errors = [];

    private $rules; 

    private $value;

    public function __construct($rules, $value)
    {
        $this->rules = $rules;

        $this->value = $value;
    }

    public function validate()
    {
        dd($this->rules);
    }


    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }
}