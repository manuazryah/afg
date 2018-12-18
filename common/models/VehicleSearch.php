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
    public $vehicle_global_search;

    public function rules() {
        return [
            [['id', 'cheque_no', 'add_chgs', 'status_id'], 'integer'],
            [['model', 'make', 'hat', 'weight', 'value', 'buyer_no', 'towed_from', 'lot_no', 'towed_amount', 'storage_amount', 'vin', 'created_at', 'updated_at', 'created_by', 'year', 'requested_date', 'dely_date', 'keys', 'color', 'title', 'title_received', 'pickup_date', 'towed', 'vehicle_global_search'], 'safe'],
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

        $query->andFilterWhere(['like', 'hat', $this->hat])
                ->andFilterWhere(['like', 'weight', $this->weight])
                ->andFilterWhere(['like', 'value', $this->value])
                ->andFilterWhere(['like', 'buyer_no', $this->buyer_no])
                ->andFilterWhere(['like', 'towed_from', $this->towed_from])
                ->andFilterWhere(['like', 'towed_amount', $this->towed_amount])
                ->andFilterWhere(['like', 'storage_amount', $this->storage_amount])
                ->andFilterWhere(['like', 'vehicle_title_info.title_received', $this->title_received])
                ->andFilterWhere(['like', 'vehicle_title_info.towing_request_date', $this->requested_date])
                ->andFilterWhere(['like', 'vehicle_title_info.deliver_date', $this->dely_date])
                ->andFilterWhere(['like', 'vehicle_title_info.pickup_date', $this->pickup_date])
                ->andFilterWhere(['like', 'vehicle_towing_info.keys', $this->keys])
                ->andFilterWhere(['like', 'vehicle_towing_info.towed', $this->towed])
                ->andFilterWhere(['like', 'created_by', $this->created_by]);

        if (!empty($this->vehicle_global_search)) {
            $arr = [];
            if ($this->vin == '') {
                $query1 = new yii\db\Query();
                $query1->select(['*'])->from('vehicle')->andWhere(['like', 'vin', $this->vehicle_global_search]);
                $command = $query1->createCommand();
                $result1 = $command->queryAll();
                if (!empty($result1)) {
                    foreach ($result1 as $ind_val) {
                        $arr[] = $ind_val['id'];
                    }
                }
            } else {
                $query->andFilterWhere(['like', 'vin', $this->vin]);
            }
            if ($this->model == '') {
                $query2 = new yii\db\Query();
                $query2->select(['*'])->from('vehicle')->andWhere(['like', 'model', $this->vehicle_global_search]);
                $command2 = $query2->createCommand();
                $result2 = $command2->queryAll();
                if (!empty($result2)) {
                    foreach ($result2 as $ind_val) {
                        $arr[] = $ind_val['id'];
                    }
                }
            } else {
                $query->andFilterWhere(['like', 'model', $this->model]);
            }
            if ($this->make == '') {
                $query3 = new yii\db\Query();
                $query3->select(['*'])->from('vehicle')->andWhere(['like', 'make', $this->vehicle_global_search]);
                $command3 = $query3->createCommand();
                $result3 = $command3->queryAll();
                if (!empty($result3)) {
                    foreach ($result3 as $ind_val) {
                        $arr[] = $ind_val['id'];
                    }
                }
            } else {
                $query->andFilterWhere(['like', 'make', $this->make]);
            }
            if ($this->lot_no == '') {
                $query4 = new yii\db\Query();
                $query4->select(['*'])->from('vehicle')->andWhere(['like', 'lot_no', $this->vehicle_global_search]);
                $command4 = $query4->createCommand();
                $result4 = $command4->queryAll();
                if (!empty($result4)) {
                    foreach ($result4 as $ind_val) {
                        $arr[] = $ind_val['id'];
                    }
                }
            } else {
                $query->andFilterWhere(['like', 'lot_no', $this->lot_no]);
            }
            if ($this->color == '') {
                $query5 = new yii\db\Query();
                $query5->select(['*'])->from('vehicle')->andWhere(['like', 'color', $this->vehicle_global_search]);
                $command5 = $query5->createCommand();
                $result5 = $command5->queryAll();
                if (!empty($result5)) {
                    foreach ($result5 as $ind_val) {
                        $arr[] = $ind_val['id'];
                    }
                }
            } else {
                $query->andFilterWhere(['like', 'color', $this->color]);
            }
            if ($this->lot_no == '') {
                $query4 = new yii\db\Query();
                $query4->select(['*'])->from('vehicle')->andWhere(['like', 'lot_no', $this->vehicle_global_search]);
                $command4 = $query4->createCommand();
                $result4 = $command4->queryAll();
                if (!empty($result4)) {
                    foreach ($result4 as $ind_val) {
                        $arr[] = $ind_val['id'];
                    }
                }
            } else {
                $query->andFilterWhere(['like', 'lot_no', $this->lot_no]);
            }
            $customers = Customers::find()->where(['like', 'name', $this->vehicle_global_search])->all();
            if (!empty($customers)) {
                foreach ($customers as $customer) {
                    $vehicle_customers = VehicleTowingInfo::find()->where(['customers_id' => $customer->id])->all();
                    if (!empty($vehicle_customers)) {
                        foreach ($vehicle_customers as $vehicle_customer) {
                            $arr[] = $vehicle_customer->vehicle_id;
                        }
                    }
                }
            }
            if (!empty($arr)) {
                $array = array_unique($arr);
                $query->andFilterWhere(['vehicle.id' => $array]);
            }
        }

        return $dataProvider;
    }

}
