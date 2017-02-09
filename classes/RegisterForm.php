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
            'last-name' => '',
            'first-name' => '',
            'middle-name' => '',
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
            'middle-name' => 'Отчество',
            'birthday' => 'Дата рождения',
            'passport' => 'Паспорт',
            'email' => 'E-mail',
        ];
    }

    public function getRules()
    {
        return [
            'lastname' => 'NameValidator',
            /*'first-name' => 'safe',
            'middle-name' => 'safe',
            'birthday' => ['date', ['min' => 18, 'max' => 50]],
            'passport' => 'safe',
            'email' => 'safe',*/
        ];
    }

}

?>
