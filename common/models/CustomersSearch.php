<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Customers;

/**
 * CustomersSearch represents the model behind the search form about `common\models\Customers`.
 */
class CustomersSearch extends Customers {

    public $global_search;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'status', 'CB', 'UB'], 'integer'],
            [['customer_id', 'name', 'email', 'phone_usa', 'trn_usa', 'address1', 'country', 'state', 'other_emails', 'upload_documents', 'company_name', 'phone_uae', 'trn_uae', 'address2', 'city', 'zipcode', 'fax', 'notes', 'created_at', 'DOC', 'DOU', 'global_search'], 'safe'],
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
        $query = Customers::find();

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
            'status' => $this->status,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
        ]);

        $query->andFilterWhere(['like', 'customer_id', $this->customer_id])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'phone_usa', $this->phone_usa])
                ->andFilterWhere(['like', 'trn_usa', $this->trn_usa])
                ->andFilterWhere(['like', 'address1', $this->address1])
                ->andFilterWhere(['like', 'country', $this->country])
                ->andFilterWhere(['like', 'state', $this->state])
                ->andFilterWhere(['like', 'other_emails', $this->other_emails])
                ->andFilterWhere(['like', 'upload_documents', $this->upload_documents])
                ->andFilterWhere(['like', 'company_name', $this->company_name])
                ->andFilterWhere(['like', 'phone_uae', $this->phone_uae])
                ->andFilterWhere(['like', 'trn_uae', $this->trn_uae])
                ->andFilterWhere(['like', 'address2', $this->address2])
                ->andFilterWhere(['like', 'city', $this->city])
                ->andFilterWhere(['like', 'zipcode', $this->zipcode])
                ->andFilterWhere(['like', 'fax', $this->fax])
                ->andFilterWhere(['like', 'notes', $this->notes]);

        if (!empty($this->global_search)) {
            $query->orFilterWhere(['like', 'customer_id', $this->global_search]);
            $query->orFilterWhere(['like', 'name', $this->global_search]);
            $query->orFilterWhere(['like', 'company_name', $this->global_search]);
            $query->orFilterWhere(['like', 'city', $this->global_search]);
            $query->orFilterWhere(['like', 'state', $this->global_search]);
            $query->orFilterWhere(['like', 'country', $this->global_search]);
            $query->orFilterWhere(['like', 'trn_usa', $this->global_search]);
        }

        return $dataProvider;
    }

}
