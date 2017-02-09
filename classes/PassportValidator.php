<?php

class PassportValidator extends Validator
{
    public function validate($passport, $params = [])
    {
        $pattern = "/^([0-9]{4})-([0-9]{6})$/";
        if (preg_match($pattern, $passport)) {
            return true;
        } else {
            return false;
        }
    }
}
