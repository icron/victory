<?php

class EmailValidator extends Validator
{
    public function validate($email, $params = [])
    {
        return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
