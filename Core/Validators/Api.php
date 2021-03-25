<?php namespace Core\Validators;

class ParamsValidator
{
    private static $object;
    protected $params;

    public $status;
    public $errors = [];

    private function __construct($params)
    {
        $this->params = $params;
    }

    public static function getValidator($params)
    {
        if(!self::$object)
        {
            return self::$object = new self($params);
        }
        return null;
    }

    public function validate($rules)
    {
        $errors = [];

        foreach($rules as $key => $rule)
        {
            if($key != 'public')
            {
                $errors[] = $this->validateRule($key, $rule, $this->params);

                if(!is_null($errors))
                {
                    if(isset($errors[$key]))
                    {
                        $errors[$key] = $this->validateErrors($errors[$key]);
                    }
                }
            }
        }
        
        $this->errors = $this->validateErrors($errors);

        if(count($this->errors)<1)
        {
            $this->status = 200;
        }
    }

    private function validateErrors($errors)
    {
        $response = [];

        foreach($errors as $error)
        {   
            if(!is_null($error))
            {
                $response[] = $error;
            }
        }

        return $response;
    }

    private function validateRule($ruleKey, $rules, $params)
    {
        if(is_array($rules))
        {
            if(!empty($rules))
            {
                if(is_array($params[$ruleKey]))
                {
                    if(isset($params[$ruleKey]))
                    {
                        if(empty($params[$ruleKey]))
                        {
                            return [
                                'error' => 'Error campo vacio',
                                'campo' => $ruleKey
                            ];  
                        }
                        else
                        {
                            $response = [];
                            foreach($rules as $key => $rule)
                            {
                            $response[$ruleKey][$key] = $this->validateRule($key, $rule, $params[$ruleKey]);
                            }
                            return $response;
                        }
                    }
                    else
                    {
                        return [
                            'error' => 'Campo inexistente',
                            'campo' => $ruleKey
                        ]; 
                    }
                }
                else
                {
                    return $this->messageConstructor(gettype($params[$ruleKey]),'array', $ruleKey);
                }
            }
        }
        else
        {
            if(!isset($params[$ruleKey]))
            {
                return [
                    'error' => 'Campo inexistente',
                    'campo' => $ruleKey
                ];
            }
            else
            {
                switch($rules)
                {
                    case 'string': 
                        if(!is_string($params[$ruleKey]))
                        {
                            return $this->messageConstructor(gettype($params[$ruleKey]),'string', $ruleKey);
                        }
                    break;
    
                    case 'int': 
                        if(!is_int($params[$ruleKey]))
                        {
                            return $this->messageConstructor(gettype($params[$ruleKey]),'int', $ruleKey);
                        }
                    break;
                }
            }
        }
    }

    private function messageConstructor($type, $expected, $ruleKey)
    {
        return [
            'error' => 'Error de tipo',
            'campo' => $ruleKey,
            'tipo' => $type,
            'esperado' => $expected
        ];
    }
}