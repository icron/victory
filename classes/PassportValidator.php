<?php

class PassportValidator extends Validator
{
    public function validate($passport, $params = [])
    {
        $pattern = "/^([0-9]{4})-([0-9]{6})$/";
        if (!preg_match($pattern, $passport)) {
            $invalidPassportMessage = isset($params['invalidPassportMessage']) ? $params['invalidPassportMessage'] : 'неверно указан номер паспорта';
            $this->addError($invalidPassportMessage);
        }

        return !$this->hasErrors();

    }
}
