<?php

class EmailValidator extends Validator
{
    public function validate($data, $params = [])
    {
        $result = (bool)filter_var($data, FILTER_VALIDATE_EMAIL);
        if ($result === false) {
            $invalidEmailMessage = isset($params['invalidEmailMessage']) ? $params['invalidEmailMessage'] : 'неверно указан адрес электронной почты';
            $this->addError($invalidEmailMessage);
        }
        return !$this->hasErrors();
    }
}
