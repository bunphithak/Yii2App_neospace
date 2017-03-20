<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Brand;

/**
 * BrandSearch represents the model behind the search form about `backend\models\Brand`.
 */
class BrandSearch extends Brand
{
    public $q;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FBCODE', 'FBNAME','q'], 'safe'],
            [['FBID'], 'integer'],
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
        $query = Brand::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
      

        $query->orFilterWhere(['like', 'FBCODE', $this->q])
            ->orFilterWhere(['like', 'FBNAME', $this->q]);

        return $dataProvider;
    }
}
