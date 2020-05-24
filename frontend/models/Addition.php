<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "addition".
 *
 * @property int $user_id
 * @property string $date
 * @property int $addition_sum
 */
class Addition extends \yii\db\ActiveRecord
{
    public $start;
    public $end;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'addition_sum'], 'required'],
            [['user_id', 'addition_sum'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'date' => 'Date',
            'addition_sum' => 'Addition Sum',
        ];
    }

    public static function getTotal($provider, $fieldName)
    {
        $total = 0;

        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }

        return $total;
    }
}
