<?php

class RegisterForm extends BaseForm
{
    public $lastname;
    public $firstname;
    public $middlename;
    public $birthday;
    public $passport;
    public $email;

    public function getDefaultValues()
    {
        return [
            'lastname' => '',
            'firstname' => '',
            'middlename' => '',
            'birthday' => '14.11.1980',
            'passport' => '',
            'email' => '',
        ];
    }

    public function getLabels()
    {
        return [
            'lastname' => 'Фамилия',
            'firstname' => 'Имя',
            'middlename' => 'Отчество',
            'birthday' => 'Дата рождения',
            'passport' => 'Паспорт',
            'email' => 'E-mail',
        ];
    }

    public function getRules()
    {
        return [
            'lastname' => ['NameValidator', ['min' => 1, 'max' => 32]],
            'firstname' => ['NameValidator', ['min' => 1, 'max' => 32]],
            'middlename' => ['NameValidator', ['min' => 1, 'max' => 32]],
            'birthday' => ['DateValidator', ['min' => 18, 'max' => 50]],
            'passport' => 'PassportValidator',
            'email' => 'EmailValidator',
        ];
    }
}

?>
