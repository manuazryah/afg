<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VehicleTitleInfo;

/**
 * VehicleTitleInfoSearch represents the model behind the search form about `common\models\VehicleTitleInfo`.
 */
class VehicleTitleInfoSearch extends VehicleTitleInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vehicle_id'], 'integer'],
            [['title', 'title_type', 'title_received', 'title_no', 'title_state', 'towing_request_date', 'deliver_date', 'note', 'created_at'], 'safe'],
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
        $query = VehicleTitleInfo::find();

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
            'title_received' => $this->title_received,
            'towing_request_date' => $this->towing_request_date,
            'deliver_date' => $this->deliver_date,
            'created_at' => $this->created_at,
            'vehicle_id' => $this->vehicle_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_type', $this->title_type])
            ->andFilterWhere(['like', 'title_no', $this->title_no])
            ->andFilterWhere(['like', 'title_state', $this->title_state])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
