<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vehicle;

/**
 * VehicleSearch represents the model behind the search form about `common\models\Vehicle`.
 */
class VehicleSearch extends Vehicle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cheque_no', 'add_chgs', 'status_id'], 'integer'],
            [['model', 'make', 'hat', 'weight', 'value', 'buyer_no', 'towed_from', 'lot_no', 'towed_amount', 'storage_amount', 'vin', 'created_at', 'updated_at', 'created_by', 'year'], 'safe'],
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
        $query = Vehicle::find();

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
            'cheque_no' => $this->cheque_no,
            'add_chgs' => $this->add_chgs,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status_id' => $this->status_id,
            'year' => $this->year,
        ]);

        $query->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'make', $this->make])
            ->andFilterWhere(['like', 'hat', $this->hat])
            ->andFilterWhere(['like', 'weight', $this->weight])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'buyer_no', $this->buyer_no])
            ->andFilterWhere(['like', 'towed_from', $this->towed_from])
            ->andFilterWhere(['like', 'lot_no', $this->lot_no])
            ->andFilterWhere(['like', 'towed_amount', $this->towed_amount])
            ->andFilterWhere(['like', 'storage_amount', $this->storage_amount])
            ->andFilterWhere(['like', 'vin', $this->vin])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
