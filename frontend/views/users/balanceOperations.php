<?php

use app\models\AdditionSearch;
use app\models\Addition;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\models\AdditionSearch */
/* @var */

$id = $dataProvider->id;
?>
<div class="users-index">


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
        'columns' => [
            'user_id:text',
            'start:datetime',
            ['attribute' => 'end',
                'format' => 'datetime',
            ],
            'date:datetime',
            [
                'attribute' => 'addition_sum',
                'footer' => AdditionSearch::getTotal($dataProvider->models, 'addition_sum'),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{delete}',

                'buttons' => [
                    'delete' => function ($url, $model, $key) {

                        return Html::a('Отменить операцию', ['users/cancel-addition', 'userId' => $model->user_id,
                            'operationId' => $model->operation_id],
                            ['data-method' => 'POST']);
                    },
                ],
            ],
        ]


    ]) ?>

</div>