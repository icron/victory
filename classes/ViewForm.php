<?php
class ViewForm extends BaseForm{

    protected $controlGroupTemplate = '<div class="form-group {class_error}">{label} <div class="controls">{input} {error}</div></div>';
    protected $form;

    public function __construct(BaseForm $form)
    {
        $this->form = $form;
    }

    public function textField($attribute)
    {
        $value = $this->form->$attribute;
        return '<input type="text" class="form-control" name="' . $attribute . '" value="' . $value . '"/>';
    }

    public function textLabel($attribute)
    {
        $value = $this->form->getLabel($attribute);
        return '<label class="form-control" for="' . $attribute . '"/>' . $value;
    }

    /**
     * Метод рендерит поле на основонии аттрибута формы
     * @param BaseForm $form Форма
     * @param string $attribute Аттрибут формы
     * @return string HTML элемент
     */
    public function textFieldRow($attribute)
    {
        $input = self::textField($attribute);
        $label = self::textLabel($attribute);
        return strtr($this->controlGroupTemplate, [
            '{input}' => $input,
            '{label}' => $label,
        ]);
    }
}