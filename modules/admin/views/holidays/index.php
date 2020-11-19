<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HolidaysSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отпуска';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="holidays-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить отпуск', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
