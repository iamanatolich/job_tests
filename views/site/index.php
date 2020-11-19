<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Главная';

?>
<div class="site-index">

    <p>
        <?= Html::a('Добавить отпуск', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Сотрудники',
                'format' => 'raw',
                'value' => function ($model) {
                    $value = "{$model->user->fullname}";

                    return  $model->user->id === Yii::$app->user->id ? "<strong>$value</strong>" : $value;
                }
            ],
            [
                'attribute' => 'date_in',
                'label' => 'Начало',
                'format' => 'raw',
                'value' => function ($model) {
                    $value = "{$model->date_in}";
                    return date("m.d.Y", strtotime($value));
                }
            ],
            [
                'attribute' => 'date_out',
                'label' => 'Конец',
                'format' => 'raw',
                'value' => function ($model) {
                    $value = "{$model->date_in}";
                    return date("m.d.Y", strtotime($value));
                }
            ],
            [
                'attribute' => 'approved',
                'label' => 'Утвержден',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->approved ? '<span class="approved">Да</span>' : '<span class="not-approved">Нет</span>';
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'visibleButtons' => [
                    'update' => function ($model) {
                        return (Yii::$app->user->identity->id_position == "1") || ($model->user->id === Yii::$app->user->id && !$model->approved);
                    },
                    'delete' => function ($model) {
                        return Yii::$app->user->can('holidayApproved') ||
                            ($model->user->id === Yii::$app->user->id && !$model->approved);
                    }
                ],
            ],
        ],
    ]); ?>

</div>
