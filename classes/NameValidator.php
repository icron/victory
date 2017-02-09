<?php

class NameValidator extends Validator
{
    public function validate($data, $params = [])
    {
        $allowedLetters = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф',
            'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М',
            'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я'];
        // Разбиваем на символы:
        $countLetters = mb_strlen($data);

        // TODO перенести параметр 1 в $params
        if ($countLetters < 1) {
            $this->addError('Длинна строки меньше...');
            return false;
        }
        // TODO перенести параметр 32 в $params
        if ($countLetters > 32) {
            $this->addError('Длинна строки больше...');
            return false;
        }

        // Посимвольно проверяем принадлежность символа к массиву.
        $i = 0;
        while ($i < $countLetters) {
            $letter = mb_substr($data, $i, 1);
            if (!in_array($letter, $allowedLetters)) {
                $this->addError('Невалиные символы');
                return false;
            }
            $i++;
        }

        return true;
    }
}