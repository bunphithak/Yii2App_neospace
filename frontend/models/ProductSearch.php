<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Product;

/**
 * ProductSearch represents the model behind the search form about `frontend\models\Product`.
 */
class ProductSearch extends Product
{
    public $q;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FPDID', 'FPDACTIVE'], 'integer'],
            [['FPDNAME', 'FPDBRAND', 'FPDCODE', 'q'], 'safe'],
           
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
        $query = Product::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where(['FPDACTIVE'=>1]);
            return $dataProvider;
        }
        $query->orFilterWhere(['like', 'FPDNAME', $this->q])
            ->orFilterWhere(['like', 'FPDBRAND', $this->q])
            ->orFilterWhere(['like', 'FPDCODE', $this->q]);

        return $dataProvider;
    }
}
