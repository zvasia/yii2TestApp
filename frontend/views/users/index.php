<?php

namespace app\views;

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Зарегистрировать пользователя',
            ['value' => Url::to('index.php?r=users/create'),
                'class' => 'btn btn-success',
                'id' => 'modalButton'
            ])
        ?>
        <?= Html::button('Пополнить баланс',
            ['value' => Url::to('index.php?r=users/update'),
                'class' => 'btn btn-success',
                'id' => 'updateButton'
            ])
        ?>
    </p>

    <!--     модалка пополнения баланса-->
    <?php Modal::begin([
        'size' => 'modal-lg',
        'id' => 'update'
    ]);

    echo "<div id='updateContent'></div>";

    Modal::end(); ?>

    <!--     модалка регистрации-->
    <?php Modal::begin([
        'size' => 'modal-lg',
        'id' => 'modal'
    ]);

    echo "<div id='modalContent'></div>";

    Modal::end(); ?>

    <!--    вывод таблицы-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            ['attribute' => 'phone',
                'format' => 'text'],
            'full_name:text',
            'balance',
            ['class' => 'yii\grid\CheckboxColumn',
                'checkboxOptions' => function ($model) {
                    return [
                        'checked' => $model->status == 1 ? true : false,
                        'onchange' => '$.ajax("index.php?r=users/changestatus&id='
                            .$model->id.'&status=" + ($(this).prop("checked") ? "1" : "0") );'
                    ];
                }
            ]]])

            ?>


</div>
