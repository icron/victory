<?php

class HtmlHelper
{

    public function xxx()
    {

    }

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
        return self::prepareFormGroup($input, $label);
    }

    private static function prepareFormGroup($field, $label)
    {
        return sprintf('<div class="form-group">%s %s</div>', $label, $field);
    }

    public static function label(BaseForm $form, $attribute)
    {
        return strtr(
            '<label for="{attribute}">{value}</label>',
            [
                '{attribute}' => $attribute,
                '{value}' => $form->getLabel($attribute)
            ]
        );
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
