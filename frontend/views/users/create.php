<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */


$this->title = 'Регистрация пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php ActiveForm::begin(); ?>
    <div class="users-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'full_name')->textInput() ?>

        <?= $form->field($model, 'balance')->textInput() ?>

        <?= $form->field($model, 'status')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>