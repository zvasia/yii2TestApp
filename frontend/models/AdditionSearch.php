<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


class AdditionSearch extends Addition
{


    public function rules()
    {
        return [
            [['user_id', ], 'integer'],
            //[['date'], 'safe'],
            ['start', 'date', 'timestampAttribute' => 'start', 'timestampAttributeFormat' => 'php:Y-m-d H:i:s', 'format' => 'php:M d, Y, H:i:s'],
//            ['start', 'date', 'timestampAttribute' => 'start', 'format' => 'php:Y-m-d H:i:s'

            ['end', 'date', 'timestampAttribute' => 'end', 'timestampAttributeFormat' => 'php:Y-m-d H:i:s', 'format' => 'php:M d, Y, H:i:s'],

//                ['end', 'date', 'timestampAttribute' => 'end', 'format' => 'php:Y-m-d H:i:s'
//                ]

        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Addition::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions

        $query->andFilterWhere([
            'user_id' => $this->user_id,
        ]);

        //$query->andFilterWhere(['>=', 'start', $this->date]);
        if($this->start !== null && $this->end !== null){

            $query->andFilterWhere(['>=', 'date', $this->start]);
            $query->andFilterWhere(['<=', 'date', $this->end]);

        }

        return $dataProvider;
    }
}
