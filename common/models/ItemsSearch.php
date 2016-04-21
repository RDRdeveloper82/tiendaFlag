<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Items;

/**
 * ItemsSearch represents the model behind the search form about `common\models\Items`.
 */
class ItemsSearch extends Items
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'brand_id', 'cat_id'], 'integer'],
            [['item_name'], 'safe'],
        ];
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
        $query = Items::find();

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
            'id' => $this->id,
            'brand_id' => $this->brand_id,
            'cat_id' => $this->cat_id,
        ]);

        $query->andFilterWhere(['like', 'item_name', $this->item_name]);

        return $dataProvider;
    }
}
