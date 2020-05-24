<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $phone
 * @property string $full_name
 * @property int $balance
 * @property int $status
 * @property int $id
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'full_name'], 'required'],
            [['phone', 'balance', 'status'], 'integer'],
            [['full_name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'phone' => 'Телефон',
            'full_name' => 'ФИО',
            'balance' => 'Баланс',
            'status'  => 'Статус',
            'id' => 'ID',
        ];
    }
}
