<?php

use app\models\AdditionSearch;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\models\AdditionSearch */


?>
<div class="users-index">kjhkjh


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
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
                'header'=>'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url,$model) {
                        return Html::a(
                            '<p>Отменить платеж</p>',
                            $url);
                    },
                ],
            ],
            ]

    ]) ?>

</div>