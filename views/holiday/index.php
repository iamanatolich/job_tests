<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отпуска';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="holidays-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить отпуск', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id_user',
                'format' => 'raw',
                'value' => function ($model) {
                    $value = "{$model->user->fullname}";
                    return  $value;
                }
            ],
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
                'attribute' => 'approved',
//                'label' => 'Согласование',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->approved ? '<strong>Согласован</strong>' : 'Не согласован';
                }
            ],
//            [
//                'attribute' => 'approved_1',
//                'label' => 'Согласование',
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return $model->approved ? '
//<input type="hidden" name="Holidays[approved]" value="0"><label><input type="checkbox" id="holidays-approved" name="Holidays[approved]" value="1" checked=""></label>' : '
//<input type="hidden" name="Holidays[approved]" value="0"><label><input type="checkbox" id="holidays-approved" name="Holidays[approved]" value="1"></label>';
//                }
//            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'visibleButtons' => [
                    'update' => function ($model) {
                        return (Yii::$app->user->identity->id_position == "1") || ($model->user->id === Yii::$app->user->id && !$model->approved);
                    },
                    'delete' => function ($model) {
                        return (Yii::$app->user->identity->id_position == "1") || ($model->user->id === Yii::$app->user->id && !$model->approved);
                    }
                ],
            ],
        ],
    ]); ?>


</div>
