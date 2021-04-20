<?php
namespace app\core\blade\form;

use app\core\Model;

class Checkbox
{
    const REQUIRED = 'required';

    public Model $model;
    public string $attribute;
    public string $value;

    public string $checked;
    public string $required;
    public string $invalid;
    public string $feedback = 'I agree to';


    public function __construct(
        Model $model,
        string $attribute,
        string $value
    ) {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->value = $value;
        $this->checked = '';
        $this->required = '';
        $this->invalid = $model->hasError($attribute) ? ' is-invalid' : '';
    }

    public function __toString()
    {
        if($this->model->hasError($this->attribute)) {
            $this->message = $this->model->getFirstError($this->attribute);
        }
        if(!empty($this->model->{$this->attribute})){
            $this->checked = 'checked';
        }

        return sprintf(
            '<div id="%s" class="form-field%s">
              <div class="cb-container">
                <input value="%s" name="%s" type="checkbox" %s %s>
                <span class="checkbox">
                  <img src="img/ic_checkmark.svg">
                </span>
              </div>
              <div class="feedback">
                %s <a href="#" class="link">terms of service</a>
              </div>
            </div>',
            $this->attribute,
            $this->invalid,
            $this->value,
            $this->attribute,
            $this->checked,
            $this->required,
            $this->feedback
        );
    }

    public function required()
    {
        $this->required = self::REQUIRED;
        return $this;
    }
}