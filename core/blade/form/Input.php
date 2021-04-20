<?php
namespace app\core\blade\form;

use app\core\Model;

class Input
{
    const TEXT = 'text';
    const EMAIL = 'email';
    const REQUIRED = 'required';

    public Model $model;
    public string $attribute;
    
    public string $type;
    public string $placeholder;
    public array $rules;
    public string $invalid;
    public string $required;

    public function __construct(
        Model $model,
        string $attribute,
        array $rules
    ) {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->rules = $rules;
        $this->type = self::TEXT;
        $this->placeholder = '';
        $this->invalid = $model->hasError($attribute) ? ' is-invalid' : '';
    }

    public function __toString()
    {
        $rules = [];
        foreach ($this->rules as $key => $value) {
            $rules[] = "$key=\"$value\"";
        }

        return sprintf(
            '<div id="%s" class="form-field%s">
              <span class="input-line"></span>
              <input value="%s" name="%s" type="%s" placeholder="%s" %s %s>
              <button class="arrow" type="submit"></button>
              <div class="feedback">%s</div>
            </div>',
            $this->attribute,
            $this->invalid,
            $this->model->{$this->attribute},
            $this->attribute,
            $this->type,
            $this->placeholder,
            implode(" ", $rules),
            $this->required,
            $this->model->getFirstError($this->attribute)
        );
    }

    public function email()
    {
        $this->type = self::EMAIL;
        return $this;
    }

    public function required()
    {
        $this->required = self::REQUIRED;
        return $this;
    }

    public function placeholder(string $ph)
    {
        $this->placeholder = $ph;
        return $this;
    }
}