<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VehicleTowingInfo;

/**
 * VehicleTowingInfoSearch represents the model behind the search form about `common\models\VehicleTowingInfo`.
 */
class VehicleTowingInfoSearch extends VehicleTowingInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customers_id', 'vehicle_id'], 'integer'],
            [['customer_address', 'condition', 'damaged', 'pictures', 'towed', 'keys', 'created_at'], 'safe'],
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
        $query = VehicleTowingInfo::find();

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
            'created_at' => $this->created_at,
            'customers_id' => $this->customers_id,
            'vehicle_id' => $this->vehicle_id,
        ]);

        $query->andFilterWhere(['like', 'customer_address', $this->customer_address])
            ->andFilterWhere(['like', 'condition', $this->condition])
            ->andFilterWhere(['like', 'damaged', $this->damaged])
            ->andFilterWhere(['like', 'pictures', $this->pictures])
            ->andFilterWhere(['like', 'towed', $this->towed])
            ->andFilterWhere(['like', 'keys', $this->keys]);

        return $dataProvider;
    }
}
