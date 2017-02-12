<?php

class HtmlHelper
{
    public static $controlGroupTemplate = '<div class="form-group {class_error}">{label} <div class="controls">{input} {error}</div></div>';

    public static function textField(BaseForm $form, $attribute)
    {
        $value = $form->$attribute;
        return '<input type="text" class="form-control" name="' . $attribute . '" value="' . $value . '"/>';
    }

    /**
     * Метод рендерит поле на основонии аттрибута формы
     * @param BaseForm $form Форма
     * @param string $attribute Аттрибут формы
     * @return string HTML элемент
     */
    public static function textFieldRow(BaseForm $form, $attribute)
    {
        $label = self::label($form, $attribute);
        $input = self::textField($form, $attribute);
        $error = self::error($form, $attribute);
        return strtr(self::$controlGroupTemplate, [
            '{class_error}' => !empty($error) ? 'error' : '',
            '{label}' => $label,
            '{input}' => $input,
            '{error}' => $error
        ]);
    }

    public static function label(BaseForm $form, $attribute)
    {
        return strtr(
            '<label class="control-label for="{attribute}">{value}</label>',
            [
                '{attribute}' => $attribute,
                '{value}' => $form->getLabel($attribute)
            ]
        );
    }

    public static function error(BaseForm $form, $attribute)
    {
        $errors = $form->getErrors();
        $result = !empty($errors[$attribute]) ? $errors[$attribute] : null;

        if ($result !== null) {
            $result = '<span class="help-inline error">' . implode('<br />', $result) . '</span>';
        }
        return $result;
    }

    public static function renderErrorsSummary(BaseForm $form)
    {
        $result = '<ul class="errors">';
        foreach ($form->getErrors() as $attribute => $errors) {
            foreach ($errors as $error) {
                $result .= '<li>' .  $form->getLabel($attribute) . ' ' . $error . '</li>';
            }
        }
        $result .= '</ul>';
        return $result;
    }
}
