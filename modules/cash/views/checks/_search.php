<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChecksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="checks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'alobs_no') ?>

    <?= $form->field($model, 'dv_no') ?>

    <?= $form->field($model, 'class') ?>

    <?= $form->field($model, 'particular') ?>

    <?php // echo $form->field($model, 'fund') ?>

    <?php // echo $form->field($model, 'checkno') ?>

    <?php // echo $form->field($model, 'acicno') ?>

    <?php // echo $form->field($model, 'netamount') ?>

    <?php // echo $form->field($model, 'wtax') ?>

    <?php // echo $form->field($model, 'gross') ?>

    <?php // echo $form->field($model, 'payee') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'cancelled') ?>

    <?php // echo $form->field($model, 'claimed') ?>

    <?php // echo $form->field($model, 'available') ?>

    <?php // echo $form->field($model, 'rescode') ?>

    <?php // echo $form->field($model, 'chargeto') ?>

    <?php // echo $form->field($model, 'daterel') ?>

    <?php // echo $form->field($model, 'orno') ?>

    <?php // echo $form->field($model, 'tclass') ?>

    <?php // echo $form->field($model, 'ctime') ?>

    <?php // echo $form->field($model, 'enctime') ?>

    <?php // echo $form->field($model, 'printime') ?>

    <?php // echo $form->field($model, 'alobsled') ?>

    <?php // echo $form->field($model, 'recno') ?>

    <?php // echo $form->field($model, 'ordate') ?>

    <?php // echo $form->field($model, 'cellno') ?>

    <?php // echo $form->field($model, 'daterecd') ?>

    <?php // echo $form->field($model, 'payledrecno') ?>

    <?php // echo $form->field($model, 'nature') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
