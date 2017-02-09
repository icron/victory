<?php

abstract class Validator
{
    protected $errors = [];

    abstract public function validate($data, $params = []);

    public function addError($error)
    {
        $this->errors[] = $error;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }
}
