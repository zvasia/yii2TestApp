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
            [['date'], 'safe'],
            ['start', 'date', 'timestampAttribute' => 'start', 'format' => 'php:M d, Y, H:i:s'],
            ['end', 'date', 'timestampAttribute' => 'end', 'format' => 'php:d.m.Y H:i:s']
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
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'addition_sum' => $this->addition_sum,
            'start' => $this->start,
            'end' => $this->end,
            'date' => $this->date
        ]);

        $query->andFilterWhere(['between', 'date', $this->start, $this->end]);

        return $dataProvider;
    }
}
