<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VechicleCondition;

/**
 * VechicleConditionSearch represents the model behind the search form about `common\models\VechicleCondition`.
 */
class VechicleConditionSearch extends VechicleCondition
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vehicle_id'], 'integer'],
            [['front_windshield', 'bonnet', 'grill', 'front_bumber', 'front_head_light', 'rear_windshield', 'truck_door', 'rear_bumber', 'rear_bumber_support', 'tail_lamp', 'front_left_fender', 'left_front_door', 'left_rear_door', 'left_rear_fender', 'piller', 'roof', 'right_rear_fender', 'right_rear_door', 'right_front_door', 'front_right_fender', 'front_tyers', 'created_at'], 'safe'],
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
        $query = VechicleCondition::find();

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
            'vehicle_id' => $this->vehicle_id,
        ]);

        $query->andFilterWhere(['like', 'front_windshield', $this->front_windshield])
            ->andFilterWhere(['like', 'bonnet', $this->bonnet])
            ->andFilterWhere(['like', 'grill', $this->grill])
            ->andFilterWhere(['like', 'front_bumber', $this->front_bumber])
            ->andFilterWhere(['like', 'front_head_light', $this->front_head_light])
            ->andFilterWhere(['like', 'rear_windshield', $this->rear_windshield])
            ->andFilterWhere(['like', 'truck_door', $this->truck_door])
            ->andFilterWhere(['like', 'rear_bumber', $this->rear_bumber])
            ->andFilterWhere(['like', 'rear_bumber_support', $this->rear_bumber_support])
            ->andFilterWhere(['like', 'tail_lamp', $this->tail_lamp])
            ->andFilterWhere(['like', 'front_left_fender', $this->front_left_fender])
            ->andFilterWhere(['like', 'left_front_door', $this->left_front_door])
            ->andFilterWhere(['like', 'left_rear_door', $this->left_rear_door])
            ->andFilterWhere(['like', 'left_rear_fender', $this->left_rear_fender])
            ->andFilterWhere(['like', 'piller', $this->piller])
            ->andFilterWhere(['like', 'roof', $this->roof])
            ->andFilterWhere(['like', 'right_rear_fender', $this->right_rear_fender])
            ->andFilterWhere(['like', 'right_rear_door', $this->right_rear_door])
            ->andFilterWhere(['like', 'right_front_door', $this->right_front_door])
            ->andFilterWhere(['like', 'front_right_fender', $this->front_right_fender])
            ->andFilterWhere(['like', 'front_tyers', $this->front_tyers]);

        return $dataProvider;
    }
}
