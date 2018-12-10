<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Consignee;

/**
 * ConsigneeSearch represents the model behind the search form about `common\models\Consignee`.
 */
class ConsigneeSearch extends Consignee {

    public $consignee_global_search;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'consignee_id', 'customers_id', 'status', 'CB', 'UB'], 'integer'],
            [['consignee_name', 'address1', 'city', 'country', 'phone', 'address2', 'state', 'zipcode', 'DOC', 'DOU', 'consignee_global_search'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Consignee::find();

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
            'consignee_id' => $this->consignee_id,
            'customers_id' => $this->customers_id,
            'status' => $this->status,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
        ]);

        $query->andFilterWhere(['like', 'consignee_name', $this->consignee_name])
                ->andFilterWhere(['like', 'address1', $this->address1])
                ->andFilterWhere(['like', 'city', $this->city])
                ->andFilterWhere(['like', 'country', $this->country])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'address2', $this->address2])
                ->andFilterWhere(['like', 'state', $this->state])
                ->andFilterWhere(['like', 'zipcode', $this->zipcode]);

        if (!empty($this->consignee_global_search)) {
            $query->orFilterWhere(['like', 'consignee_name', $this->consignee_global_search]);
            $query->orFilterWhere(['like', 'city', $this->consignee_global_search]);
            $query->orFilterWhere(['like', 'state', $this->consignee_global_search]);
            $query->orFilterWhere(['like', 'country', $this->consignee_global_search]);
        }
        if (!empty($this->customers_id)) {
            $query->andFilterWhere(['customers_id' => $this->customers_id]);
        }

        return $dataProvider;
    }

}
