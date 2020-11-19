<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Holidays */

$this->title = 'Редактировать отпуск: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Holidays', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="holidays-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
