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

        if (isset($params['min'])) {
            if ($countLetters < (int)$params['min']) {
                $minMessage = isset($params['minMessage']) ? $params['minMessage'] : 'длина строки меньше' . (int)$params['min'];
                // Сообщение берем из params['minMessage'] если этого параметра нет, то берем текст по умолчанию "длина строки меньше..."
                $this->addError($minMessage);
            }
        }

        if (isset($params['max'])) {
            if ($countLetters > (int)$params['max']) {
                $maxMessage = isset($params['maxMessage']) ? $params['maxMessage'] : 'длина строки больше' . (int)$params['max'];
                // Сообщение берем из params['maxMessage'] если этого параметра нет, то берем текст по умолчанию "длина строки больше..."
                $this->addError($maxMessage);
            }
        }

        // Посимвольно проверяем принадлежность символа к массиву.
        $i = 0;
        while ($i < $countLetters) {
            $letter = mb_substr($data, $i, 1);
            if (!in_array($letter, $allowedLetters)) {
                $invalidLettersMessage = isset($params['invalidLettersMessage']) ? $params['invalidLettersMessage'] : 'использованы недопустимые символы';
                $this->addError($invalidLettersMessage);
                break;
            }
            $i++;
        }

        return !$this->hasErrors();
    }
}