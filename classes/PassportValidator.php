<?php

class PassportValidator extends Validator
{
    public function validate($passport, $params = [])
    {
        $pattern = "/^([0-9]{4})-([0-9]{6})$/";
        if (!preg_match($pattern, $passport)) {
            $this->addError(' - паспорт должен быть в формате 0000-000000');
            return false;
        }

        return true;

    }
}
