<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,

        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if (Yii::$app->user->isGuest) {
        $items[] = ['label' => 'Вход', 'url' => ['/auth/login']];
    } else {
        if (Yii::$app->user->identity->id_position == 1) {
            $items[] = ['label' => 'Отпуска', 'url' => ['/admin/holidays']];
            $items[] = ['label' => 'Пользователи', 'url' => ['/admin/users']];
        }

        $items[] = ['label' => 'Редактировать профиль', 'url' => ['/users/update?id='.Yii::$app->user->id]];
        $items[] = [
            'label' => 'Выход (' . Yii::$app->user->identity->login . ')',
            'url' => ['/auth/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items,
    ]);

//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//
//            if(Yii::$app->user->isGuest)
//                {
//                    ['label' => 'Login', 'url' => ['/site/login']];
//                }
//
////            Yii::$app->user->isGuest ? (
////                ['label' => 'Login', 'url' => ['/site/login']]
////            ) : (
////                '<li>'
////                . Html::beginForm(['/site/logout'], 'post')
////                . Html::submitButton(
////                    'Logout (' . Yii::$app->user->identity->username . ')',
////                    ['class' => 'btn btn-link logout']
////                )
////                . Html::endForm()
////                . '</li>'
////            )
//        ],
//    ]);
   NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
