<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ChecksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Checks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Checks'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'date',
            'alobs_no',
            'dv_no',
            'class',
            'particular',
            // 'fund',
            // 'checkno',
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
            // 'recno',
            // 'ordate',
            // 'cellno',
            // 'daterecd',
            // 'payledrecno',
            // 'nature',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
