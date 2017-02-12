<?php

use yii\helpers\Html;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */

$this->title = 'Login';
$session = Yii::$app->session;
?>
<div class="col-md-4">
    <div class="card">
        <div class="header">
            <h4 class="title">
                Cash Office Database
            </h4>
            <p class="category">You need a registered <strong>upou.edu.ph</strong> account to access the system.</p>
        </div>
        <div class="content">
            <p>
                <?= Html::a('<i class="fa fa-google-plus"></i>
                Sign-in', ['site/auth', 'authclient' => 'google'], ['class' => 'btn btn-lg btn-danger']) ?>
                Click to login.
            </p>
        </div>
    </div>
</div>
