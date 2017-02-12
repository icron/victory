<?php
    error_reporting(E_ALL);
    mb_internal_encoding("UTF-8");

    //require_once __DIR__ . 'classes/Validator.php';
    //$validation = new Validator;
    function validate(array $inputData)
    {
        $rules = getRules();
        $labels = getLabels();

        $result = [];
        foreach ($inputData as $fieldName => $inputItem) {
            // Проверяем, если нет в правилах входящего поля, то считаем сразу форму не валидной.
            if (!isset($rules[$fieldName])) {
                return false;
            }

            $validator = $rules[$fieldName];
            $validatorParams = [];
            if (is_array($validator)) {
                $validatorName = $validator[0];
                if (isset($validator[1])) {
                    $validatorParams = $validator[1];
                }
            } else {
                $validatorName = $validator;
            }

            $functionName = 'validate' . ucfirst($validatorName); // Имя функции, например validateDate
            // Вызваем функции валидации.
            // $functionName() - это вызов функции для каждого элемента массива соответственно.
            // Например для последнего элемента массива со значением email будет вызвана функция validateEmail
            // !$functionName() - вызываем функцию и проверяем, если у нас результат НЕ истинный.
            if (!function_exists($functionName) || !$functionName($inputItem, $validatorParams)) {
                $result[$fieldName] = 'Неверно заполнено поле ' . $labels[$fieldName];
            }
        }

        return $result;
    }

    function getRules()
    {
        return [
            'last-name' => 'checkName',
            'first-name' => 'checkName',
            'middle-name' => 'checkName',
            'birthday' => ['date', ['min' => 18, 'max' => 50]],
            'passport' => 'passport',
            'email' => 'email',
        ];
    }

    function getLabels()
    {
        return [
            'last-name' => 'Фамилия',
            'first-name' => 'Имя',
            'middle-name' => 'Отчество',
            'birthday' => 'Дата рождения',
            'passport' => 'Паспорт',
            'email' => 'E-mail',
        ];
    }


    function fillAttributes($inputData)
    {
        $attributes = getDefaultValues();
        $result = [];
        foreach($attributes as $attributeName => $value)
        {
            $result[$attributeName] = isset($inputData[$attributeName]) ?  $inputData[$attributeName] : $value;
        }

        return $result;
    }

    function getDefaultValues()
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

    function isPost()
    {
        return !empty($_POST);
    }
