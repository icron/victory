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
            'lastname' => [
                'NameValidator',
                [
                    'min' => 1,
                    'max' => 32,
                    'minMessage' => 'Длина фамилии должна быть не менее одного символа.',
                    'maxMessage' => 'Длина фамилии не должна превышать 32 символа.',
                    'invalidLettersMessage' => 'В фамилии использованы недопустимые символы.'
                ]
            ],
            'firstname' => [
                'NameValidator',
                [
                    'min' => 1,
                    'max' => 32,
                    'minMessage' => 'Длина имени должна быть не менее одного символа.',
                    'maxMessage' => 'Длина имени не должна превышать 32 символа.',
                    'invalidLettersMessage' => 'В имени использованы недопустимые символы.'
                ]
            ],
            'middlename' => [
                'NameValidator',
                [
                    'min' => 1,
                    'max' => 32,
                    'minMessage' => 'Длина отчества должна быть не менее одного символа.',
                    'maxMessage' => 'Длина отчества не должна превышать 32 символа.',
                    'invalidLettersMessage' => 'В отчестве использованы недопустимые символы.'
                ]
            ],
            'birthday' => [
                'DateValidator',
                [
                    'min' => 18,
                    'max' => 50,
                    'invalidDateMessage' => 'Дата должна быть указана в формате дд.мм.гггг',
                    'minDateMessage' => 'К сожалению, ваш возраст меньше допустимого.',
                    'maxDateMessage' => 'К сожалению, ваш возраст больше допустимого.'
                ]
            ],
            'passport' => [
                'PassportValidator',
                [
                    'invalidPassportMessage' => 'Номер паспорта должен быть указан в формате 0000-000000'
                ]
            ],
            'email' => [
                'EmailValidator',
                [
                    'invalidEmailMessage' => 'Неверно указан адрес электронной почты.'
                ]
            ],
        ];
    }
}

?>
