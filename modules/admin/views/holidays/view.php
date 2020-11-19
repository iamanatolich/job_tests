<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Holidays */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Отпуска', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="holidays-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эти даты?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'date_in',
                'format' => 'raw',
                'value' => function ($model) {
                    $value = "{$model->date_in}";
                    return date("d.m.Y", strtotime($value));
                }
            ],
            [
                'attribute' => 'date_out',
                'format' => 'raw',
                'value' => function ($model) {
                    $value = "{$model->date_out}";
                    return date("d.m.Y", strtotime($value));
                }
            ],
            [
                'attribute' => 'id_user',
                'format' => 'raw',
                'value' => function ($model) {
                    $value = "{$model->user->fullname}";
                    return  $value;
                }
            ],
            [
                'attribute' => 'approved',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->approved ? '<strong>Согласован</strong>' : 'Не согласован';
                }
            ],
        ],
    ]) ?>

</div>
