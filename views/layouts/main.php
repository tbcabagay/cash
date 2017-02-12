<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\LightBootstrapAsset;
use app\assets\FontAwesomeAsset;
use yii\bootstrap\Modal;

AppAsset::register($this);
FontAwesomeAsset::register($this);
LightBootstrapAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="<?= Url::to('@web/img/sidebar-upou.jpg') ?>">
        <div class="sidebar-wrapper">
            <div class="logo">
                <?= Html::a(Yii::$app->params['appOwner'], ['/site/index'], ['class' => 'simple-text']) ?>
            </div>

        <?php if (Yii::$app->user->isGuest): ?>
            <ul class="nav">
                <li class="<?= ($this->context->id === 'user') ? 'active' : null ?>">
                    <?= Html::a('<i class="pe-7s-user"></i><p>Users</p>', ['/cash/user/index']) ?>
                </li>
                <li class="<?= ($this->context->id === 'checks') ? 'active' : null ?>">
                    <?= Html::a('<i class="pe-7s-cash"></i><p>Checks</p>', ['/cash/checks/index']) ?>
                </li>
                <li class="<?= ($this->context->id === 'ecredit') ? 'active' : null ?>">
                    <?= Html::a('<i class="pe-7s-credit"></i><p>eCredit</p>', ['/cash/ecredit/index']) ?>
                </li>
            </ul>
        <?php endif; ?>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?= isset($this->params['navbarTitle']) ? $this->params['navbarTitle'] : '' ?>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?= Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]) ?>
                        </div>
                    </div>
                    <?= $content ?>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <?= Html::a('Home', ['/site/index']) ?>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 / <?= Yii::$app->params['appOwner'] ?> / <?= Yii::$app->params['appName'] ?>
                </p>
            </div>
        </footer>

    </div>
</div>
<?php Modal::begin([
    'size' => Modal::SIZE_LARGE,
    'header' => '<span class="modal-header-content"></span>',
    'clientOptions' => [
        'backdrop' => 'static',
    ],
]);
Modal::end(); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
