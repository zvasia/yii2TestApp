<?php

namespace common\widgets;


class RegisterForm extends \yii\base\Widget {
    public function run()
    {
        return $this->render('create');
    }
}