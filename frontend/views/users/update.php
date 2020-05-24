<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UpdateBalance */
/* @var $test */
$this->title = 'Пополнение баланса';

?>

<div class="update-form">
    <p><?php var_dump($test); ?></p>

    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Пополнить баланс', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end() ?>
</div>

