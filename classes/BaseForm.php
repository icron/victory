<?php

class BaseForm
{
    private $errors = [];
    /** @var IModel */
    private $model;

    public function __construct(IModel $model)
    {
        $this->model = $model;
    }

    public function validate()
    {
        $rules = $this->getRules();
        $validatorParams = [];
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
            $validatorClass->validate($this->$attribute, $validatorParams);
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

    public function getError($attribute)
    {
        return !empty($this->errors[$attribute]) ? $this->errors[$attribute] : null;
    }

    /*public function setErrors($x)
    {
        // Здесь что нибудь еще делаем, например, убираем лишние пробелы или еще что-нибудь.
        $this->errors[] = $x;
    }*/

    /**
     * Сохранение данных в базу данных
     */
    public function save()
    {
        /**
         *  Нужно добавить базовый абстрактный класс (или интерфейс) Model c абстрактным методом save()
         *  от которого будут наследоваться следующие классы DbModel и FileModel
         *  Соответственно дочерние классы будут реализовывать этот метод по разному. Файл - сохранть в файл
         *  Db - сохранять в базу.
         */
        $this->model->save();
    }
}