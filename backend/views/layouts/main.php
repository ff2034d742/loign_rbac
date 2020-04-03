<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yidas\yii\fontawesome\FontawesomeAsset;
use backend\assets\AppAsset;

use common\models\ValueHelpers;

AppAsset::register($this);
FontAwesomeAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport"
        content="width=device-width,
        initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
            <div class="wrap">
                <?php
                $is_admin = ValueHelpers::getRoleValue('SuperAdmin');
                if (!Yii::$app->user->isGuest){
                NavBar::begin([
                'brandLabel' => 'Yii 2 Build <i class="fa fa-plug"></i> Admin',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                'class' => 'navbar- navbar-fixed-top',
                ],
                ]);
                } else 
                {
                    NavBar::begin([
                    'brandLabel' => 'Yii 2 Build <i class="fa fa-plug"></i>',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                    ],
                    ]);
                    $menuItems = [['label' => 'Home', 'url' => ['/site/index']],];
                    if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role_id >= $is_admin) {
                    $menuItems[] = ['label' => 'Usuarios', 'url' => ['user/index']];
                    $menuItems[] = ['label' => 'Perfiles', 'url' => ['profile/index']];
                    $menuItems[] = ['label' => 'Roles', 'url' => ['/role/index']];
                    $menuItems[] = ['label' => 'Tipo-Usuarios', 'url' => ['/user-type/index']];
                    $menuItems[] = ['label' => 'Estado', 'url' => ['/status/index']];
                    }
                    if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                    } else {
                        $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';  
                    //$menuItems[] = ['label' => 'Logout (' . Yii::$app->user->identity->username .')' , 'url' => ['/site/logout']];
                    }
                    echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $menuItems,
                    ]);
                    NavBar::end();
                }
                ?>
                <div class="container">
                <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ])?>
                <?= $content ?>
                </div>

            </div>
            
        <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
