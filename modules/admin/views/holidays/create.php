<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Holidays */

$this->title = 'Добавить отпуск';
$this->params['breadcrumbs'][] = ['label' => 'Отпуска', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="holidays-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
