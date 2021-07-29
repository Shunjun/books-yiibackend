<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form  = ActiveForm::begin(); ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'email') ?>

<div class="from-group">
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php $form  = ActiveForm::end(); ?>