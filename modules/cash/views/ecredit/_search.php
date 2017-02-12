<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EcreditSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ecredit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'ecreditno') ?>

    <?= $form->field($model, 'alobs_no') ?>

    <?= $form->field($model, 'dv_no') ?>

    <?= $form->field($model, 'class') ?>

    <?php // echo $form->field($model, 'particular') ?>

    <?php // echo $form->field($model, 'fund') ?>

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

    <?php // echo $form->field($model, 'ordate') ?>

    <?php // echo $form->field($model, 'cellno') ?>

    <?php // echo $form->field($model, 'daterecd') ?>

    <?php // echo $form->field($model, 'payledrecno') ?>

    <?php // echo $form->field($model, 'nature') ?>

    <?php // echo $form->field($model, 'datetrans') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'accountno') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'debitdate') ?>

    <?php // echo $form->field($model, 'emailsent') ?>

    <?php // echo $form->field($model, 'recno') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
