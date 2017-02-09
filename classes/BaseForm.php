<?php

class BaseForm
{
    protected $errors;

    public function validate()
    {
        $rules = $this->getRules();
        $errors = [];
        // Вызываем каждый валидатор в цикле, который указан в rules и сохраняем ошибки в $this->errors
        foreach ($rules as $attribute => $validator) {
            if (is_array($validator)) {
                $validatorName = $validator[0];
                if (isset($validator[1])) {
                    $validatorParams = $validator[1];
                }
            } else {
                $validatorName = $validator;
            }
            // $validatorName - это строквое имя Класса.
            // Т.о. мы можем для создания объекта использовать переменную в котторой создержится строковое имя класса
            // $validatorName = 'NameValidator'

            /** @var Validator $validatorClass */
            $validatorClass = new $validatorName;
            $validatorClass->validate($this->$attribute);
            if ($validatorClass->hasErrors()) {
                $this->errors[$attribute] = $validatorClass->getErrors();
            }
        }
        return empty($this->errors);
    }

    public function load($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function getDefaultValues()
    {
        return [];
    }

    public function getLabels()
    {
        return [];
    }

    public function getRules()
    {
        return [];
    }

    public function getLabel($attribute)
    {
        $labels = $this->getLabels();
        return isset($labels[$attribute]) ? $labels[$attribute] : ucfirst($attribute);
    }

    /**
     * Функция возвращает все ошибки по всем валидаторам
     */
    public function getErrors()
    {
        return $this->errors;
    }

}