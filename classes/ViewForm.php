<?php
class ViewForm {

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
        return '<label for="' . $attribute . '">' . $value . '</label>';
    }

    public function error($attribute)
    {
        $error = $this->form->getError($attribute);
        if ($error !== null) {
            $error = '<span style="color: #d90202; font-size: 12px;" class="help-inline">' . implode('<br />', $error) . '</span>';
        }
        return $error;
    }

    /**
     * Метод рендерит поле на основонии аттрибута формы
     * @param BaseForm $form Форма
     * @param string $attribute Аттрибут формы
     * @return string HTML элемент
     */
    public function textFieldRow($attribute)
    {
        return strtr($this->controlGroupTemplate, [
            '{input}' => $this->textField($attribute),
            '{label}' => $this->textLabel($attribute),
            '{error}' => $this->error($attribute),
        ]);
    }
}