<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class AdminSearch extends Admin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idadmin'], 'integer'],
            [['username', 'authkey'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
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
        $query = Admin::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idadmin' => $this->idadmin,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}