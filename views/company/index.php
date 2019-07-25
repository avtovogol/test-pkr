<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?=Yii::$app->user->can('crudCompany')? Html::a('Create Company', ['create'], ['class' => 'btn btn-success']):'' ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'INN',
            'director',
            'address',

//            ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'delete' => Yii::$app->user->can('crudCompany'),
                    'update' => Yii::$app->user->can('crudCompany'),
                ]

            ],
        ],
    ]); ?>


</div>
