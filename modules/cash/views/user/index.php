<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
$this->params['navbarTitle'] = Html::a($this->title, ['/cash/user/index'], ['class'=> 'navbar-brand']);
?>
<div class="col-md-8">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id',
            'email:email',
            'firstname',
            'lastname',
            'rescode',
            // 'status',
            'created_at',
            // 'updated_at',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax' => true,
        'pjaxSettings' => [
            'options' => [
                'id' => 'app-pjax-container',
            ],
        ],
        'hover' => true,
        'export' => false,
        'toolbar' => [
            ['content' =>
                Html::a('<i class="fa fa-plus"></i>', ['create'], [
                    'title' => Yii::t('app', 'Add PC'), 
                    'class' => 'btn btn-success btn-modal',
                    'data-pjax' => 0,
                ]) . ' ' .
                Html::a('<i class="fa fa-repeat"></i>', ['index'], [
                    'class' => 'btn btn-default', 
                    'title' => Yii::t('app', 'Reset Grid'),
                    'data-pjax' => 0,
                ]),
            ],
            '{toggleData}',
        ],
        'panel' => [
            'type' => GridView::TYPE_SUCCESS,
            'heading' => 'Grid View',
        ],
    ]); ?>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="header">
            <h6 class="title">Search Form</h6>
        </div>
        <div class="content">
            <?= $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>
</div>
