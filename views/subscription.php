<?php
use app\core\blade\form\Form;

$form = new Form();
?>

<div class="subscribe">
  <h1>Subscribe to newsletter</h1>
  <h2>Subscribe to our newsletter and get 10% discount on pineapple glasses.</h2>
</div>
<?php $form = Form::begin('', 'post', 'novalidate') ?>
  <?php
  echo $form->input(
    $sub,
    'email',
    ['pattern' => '^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)(?<!(?:.co))$']
  )->email()->placeholder('Type your email address here...')->required();
  
  echo $form->checkbox($sub, 'tos', 'agreed')->required();
  ?>
<?php $form = Form::end() ?>      
