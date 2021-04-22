<?php
namespace app\core\blade\form;

use app\core\Model;

class Form
{
    /**
     * Print begining of the form field.
     *
     * @return app\core\blade\form\Form
     */
    public static function begin($action, $method, $option = '')
    {
        echo sprintf(
            '<form action="%s" method="%s" %s>',
            $action,
            $method,
            $option
        );
        return new Form();
    }

    /**
     * Print end of the form field.
     */
    public static function end()
    {
        echo '</form>';
    }

    /**
     * initializing new input field.
     *
     * @return app\core\blade\form\Input
     */
    public function input(Model $model, string $attribute, $rules = [])
    {
        return new Input($model, $attribute, $rules);
    }

    /**
     * initializing new checkbox field.
     *
     * @return app\core\blade\form\Checkbox
     */
    public function checkbox(Model $model, string $attribute, string $value)
    {
        return new Checkbox($model, $attribute, $value);
    }

}