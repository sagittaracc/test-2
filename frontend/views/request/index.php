<?php

use backend\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\RequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'email:email',
            [
                'attribute' => 'status',
                'filter' => [Request::ACTIVE => Request::ACTIVE, Request::RESOLVED => Request::RESOLVED],
                'contentOptions' => ['style' => 'width: 150px;'],
            ],
            'message:ntext',
            'comment:ntext',
            'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Request $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
