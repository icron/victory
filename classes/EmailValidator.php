<?php

class EmailValidator extends Validator
{
    public function validate($data, $params = [])
    {
        $result = (bool)filter_var($data, FILTER_VALIDATE_EMAIL);
        if ($result === false) {
            $this->addError(' - неверно указан e-mail адрес');
            return false;
        }
        return true;
    }
}
