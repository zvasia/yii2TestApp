<?php
namespace app\models;

use yii\base\Model;

class UpdateBalance extends Model
{

    public $id;
    public $sum;

    public function rules()
    {
        return [
            [['id', 'sum'], 'required'],
            [['id', 'sum'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sum' => 'Сумма пополнения'
        ];
    }
}

