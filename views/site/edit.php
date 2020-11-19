<?php

/* @var $this yii\web\View */

/* @var $searchModel app\models\HolidaysSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\grid\GridView;

$this->title = 'Редактировать профиль';
?>
<div class="site-index">
    <?php
    echo Yii::$app->user->identity->login;

//    GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'date_in',
//            'date_out',
//            'id_user',
//            'approved',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]);
    ?>
</div>