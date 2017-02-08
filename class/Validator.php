<?php
abstract class Validator {

    public $firstName;
    public $lastName;
    public $middleName;
    public $birthdayDate;
    public $passport;
    public $email;

    abstract protected function validate($data, $params = []);
}
