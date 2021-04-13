<?php
use app\core\blade\form\Form;

$form = new Form();
?>

<h1>Subscribe to newsletters</h1>
<h2>Subscribe to our newsletter and get 10% discount on pineapple glasses.</h2>

<?php $form = Form::begin('', 'post', 'novalidate') ?>
    <span class="input-line"></span>
    <?php echo $form->input($sub, 'email', [])->email()->required() ?>
    <div class="tos">
        <div class="container">
            <span class="checkbox">
                <img src="img/ic_checkmark.svg">
            </span>
            <?php echo $form->checkbox($sub, 'tos')->required() ?>
        </div>
    </div>
    <button id="arrow" type='submit'></button>
<?php $form = Form::end() ?>      