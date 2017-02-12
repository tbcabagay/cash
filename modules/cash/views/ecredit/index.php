<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EcreditSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ecredits');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ecredit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ecredit'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'date',
            'ecreditno',
            'alobs_no',
            'dv_no',
            'class',
            // 'particular',
            // 'fund',
            // 'acicno',
            // 'netamount',
            // 'wtax',
            // 'gross',
            // 'payee',
            // 'remarks',
            // 'cancelled',
            // 'claimed',
            // 'available',
            // 'rescode',
            // 'chargeto',
            // 'daterel',
            // 'orno',
            // 'tclass',
            // 'ctime',
            // 'enctime',
            // 'printime',
            // 'alobsled:ntext',
            // 'ordate',
            // 'cellno',
            // 'daterecd',
            // 'payledrecno',
            // 'nature',
            // 'datetrans',
            // 'created',
            // 'accountno',
            // 'email:email',
            // 'debitdate',
            // 'emailsent:email',
            // 'recno',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
