<?php namespace Core;

use App\CustomValidator;
use App\CustomValidatorFiles;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Validator
{
    private $options;

    private $data;

    private $files;

    private $filters;

    private $output;

    private $errors = [];

    public function __construct($options, $data, $files, $filters, $output)
    {
        $this->options = $options;

        $this->data = $data;

        $this->files = $files;

        $this->filters = $filters;

        $this->output = $output;
    }

    public function validateParams()
    {
        if(isset($this->options['params']))
            $this->validateParamsExists();   

        if(isset($this->options['files']))
            $this->validateFiles();
        
        if(isset($this->options['filters']))
            $this->validateFilters();

        if(!empty($this->errors))
            return false;

        return true;
    }

    private function validateFilters()
    {
        if(is_null($this->filters))
            return;
        
        if(isset($this->filters['searchInLike']) && isset($this->filters['searchInExact']))
            $this->errorRedundant();
        
        if(isset($this->filters['rangeBetween']) && isset($this->filters['rangeLess']) && isset($this->filters['rangeHigher']))
            $this->errorRedundant();
        
        if(isset($this->filters['rangeBetween']) && isset($this->filters['rangeLess']))
            $this->errorRedundant();

        if(isset($this->filters['rangeBetween']) && isset($this->filters['rangeHigher']))
            $this->errorRedundant();

        foreach($this->filters as $filter => $value)
        {
            if(isset($this->options['filters'][$filter]))
                $this->validateFiltersRules($filter, $value);
            else
                $this->errors['_error']['filter']['notFound'] = 'Filter not found';
        }
    }

    private function errorRedundant()
    {
        $this->errors['_error']['filter']['redundan'] = 'You can use this filters on the same time';
    }

    private function validateFiltersRules($filter, $filterValues)
    {
        switch($filter)
        {
            case 'orderBy':

                $this->makeErrorColumn('orderBy', $filterValues);

                if($filterValues['order'] == 'DESC')
                    return;

                if($filterValues['order'] == 'ASC')
                    return;

                if(($filterValues['order'] != 'DESC') || ($filterValues['order'] != 'ASC'))
                    $this->errors['_error']['filter']['orderBy']['order'] = 'Order is not valid';

            break;

            case 'searchInLike': 
                $this->makeErrorColumn('searchInLike', $filterValues);
            break;

            case 'searchInExact': 
                $this->makeErrorColumn('searchInExact', $filterValues);
            break;

            case 'rangeBetween': 
                $this->makeErrorColumn('rangeBetween', $filterValues);
            break;

            case 'rangeLess': 
                $this->makeErrorColumn('rangeLess', $filterValues);
            break;

            case 'rangeHigher': 
                $this->makeErrorColumn('rangeHigher', $filterValues);
            break;
        }
    }

    private function makeErrorColumn($name, $filterValues)
    {
        $columnRules = explode("|", $this->options['filters'][$name]['column']);

        if(!in_array($filterValues['column'], $columnRules))
            $this->errors['_error']['filter'][$name]['column'] = 'Column not found';
    }

    private function validateFiles()
    {
        foreach($this->options['files'] as $ruleName => $ruleValue)
        {
            $file = $this->files->get($ruleName);

            if(is_null($file))
                $this->errors['_error']['file'][$ruleName] = 'File is not exist: ' . $ruleName;
            else 
                $this->validateFilesRules($file, $ruleName, $ruleValue);
        }
    }

    private function validateFilesRules(UploadedFile $file, $ruleName, $ruleValue)
    {
        $arrayRules = explode("|", $ruleValue);

        foreach($arrayRules as $rule)
        {
            $extractRule = explode(":", $rule);

            switch($extractRule[0])
            {
                case 'formats':
                    $this->validateFormatsFile($file->getClientOriginalExtension(), $extractRule[1]);
                break;

                case 'max-size':
                    if($file->getSize() > $extractRule[1])
                        $this->errors['_error'][$ruleName][$extractRule[0]] = "Not size file: ". $extractRule[0];
                break;

                default: 
                    $validator = new CustomValidatorFiles($extractRule, $file);
                    if($validator->validate())
                        $this->errors['_error'][$ruleName][$extractRule[0]] = $validator->getErrors();
                break;
            }
        }
    }

    private function validateFormatsFile($extension, $extractRule)
    {
        $formats = explode(",", $extractRule);
        
        if(!in_array($extension, $formats))
            $this->errors['_error']['formats']['extension'] = "Not extension file: ". $extractRule;
    }

    private function validateParamsExists()
    {
        foreach($this->options['params'] as $paramName => $key)
        {
            if(!isset($this->data[$paramName]))
                $this->errors['_error'][$paramName] = 'Param is not exist: ' . $paramName;
            else
                $this->validateRulesParams($key, $paramName, $this->data[$paramName]);
        }
    }

    private function validateRulesParams($rules, $paramName, $paramValue)
    {
        $arrayRules = explode("|", $rules);

        foreach($arrayRules as $rule)
        {
            $extractRule = explode(":", $rule);

            switch($extractRule[0])
            {
                case 'required':
                    if($paramValue == "" || $paramValue == '')
                        $this->errors['_error'][$paramName]['required'] = "This param is required";
                break;

                case 'email':
                    if(!preg_match('/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i', $paramValue))
                    $this->errors['_error'][$paramName]['email'] = "Bad format param";
                break;

                case 'max': 
                    if(strlen($paramValue) > $extractRule[1])
                        $this->errors['_error'][$paramName]['max'] = "Exceeded length";
                break;

                case 'min': 
                    if(strlen($paramValue) < $extractRule[1])
                        $this->errors['_error'][$paramName]['max'] = "Insufficient length";
                break;

                default: 
                    $validator = new CustomValidator($extractRule, $paramValue);
                    if($validator->validate())
                        $this->errors['_error'][$paramName][$extractRule[0]] = $validator->getErrors();
                break;
            }
        }
    }

    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }
}