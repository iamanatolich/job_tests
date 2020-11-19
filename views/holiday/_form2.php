<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Holidays */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="holidays-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_in')->input('date') ?>

    <?= $form->field($model, 'date_out')->input('date') ?>

    <?php
    if(Yii::$app->user->identity->id_position == "1") {
        echo $form->field($model, 'approved')->checkbox();
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
