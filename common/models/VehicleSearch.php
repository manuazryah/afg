<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vehicle;

/**
 * VehicleSearch represents the model behind the search form about `common\models\Vehicle`.
 */
class VehicleSearch extends Vehicle {

    /**
     * @inheritdoc
     */
    public $requested_date;
    public $dely_date;
    public $keys;
    public $title;
    public $title_received;
    public $towed;
    public $pickup_date;

    public function rules() {
        return [
            [['id', 'cheque_no', 'add_chgs', 'status_id'], 'integer'],
            [['model', 'make', 'hat', 'weight', 'value', 'buyer_no', 'towed_from', 'lot_no', 'towed_amount', 'storage_amount', 'vin', 'created_at', 'updated_at', 'created_by', 'year', 'requested_date', 'dely_date','keys','color','title','title_received','pickup_date','towed'], 'safe'],
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
        $query = Vehicle::find();
        $query->joinWith(['titleInfos']);
        $query->joinWith(['towingInfos']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $dataProvider->sort->attributes['requested_date'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['vehicle_title_info.towing_request_date' => SORT_ASC],
            'desc' => ['vehicle_title_info.towing_request_date' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['dely_date'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['vehicle_title_info.deliver_date' => SORT_ASC],
            'desc' => ['vehicle_title_info.deliver_date' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['keys'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['vehicle_towing_info.keys' => SORT_ASC],
            'desc' => ['vehicle_towing_info.keys' => SORT_DESC],
        ];
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
                ->andFilterWhere(['like', 'vehicle_title_info.towing_request_date', $this->requested_date])
                ->andFilterWhere(['like', 'vehicle_title_info.deliver_date', $this->dely_date])
                ->andFilterWhere(['like', 'vehicle_title_info.pickup_date', $this->pickup_date])
                ->andFilterWhere(['like', 'vehicle_towing_info.keys', $this->keys])
                ->andFilterWhere(['like', 'vehicle_towing_info.towed', $this->towed])
                ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }

}
