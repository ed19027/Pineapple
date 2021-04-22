<?php
namespace app\core\blade\form;

use app\core\Model;

class Input
{
    /**
     * @param const The constants for variable $type and $required.
     */
    const TEXT = 'text';
    const EMAIL = 'email';
    const REQUIRED = 'required';

    /**
     * @param Model|string The variables passed from the view in constructor.
     */
    public Model $model;
    public string $attribute;
    public array $rules;
    
    /**
     * @param string The dinamic variables. These are based on model state.
     */
    public string $type;
    public string $placeholder;
    public string $invalid;
    public string $required;

    /**
     * Input constructor.
     *
     * @param app\core\Model $model
     * @param string $attribute
     * @param string $value
     */
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

    /**
     * Return new object as a string by magic method __toString.
     *
     * @return string 
     */
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

    /**
     * Set Input field type - email.
     * Method for using in chain.
     *
     * @return app\core\blade\form\Input
     */
    public function email()
    {
        $this->type = self::EMAIL;
        return $this;
    }

    /**
     * Make Input field required.
     * Method for using in chain.
     *
     * @return app\core\blade\form\Input
     */
    public function required()
    {
        $this->required = self::REQUIRED;
        return $this;
    }

    /**
     * Set Input field placeholder - to passed string.
     * Method for using in chain.
     *
     * @return app\core\blade\form\Input
     */
    public function placeholder(string $ph)
    {
        $this->placeholder = $ph;
        return $this;
    }
}