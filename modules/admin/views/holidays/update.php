<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Holidays */

$this->title = 'Редактировать отпуск: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Отпуска', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="holidays-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
