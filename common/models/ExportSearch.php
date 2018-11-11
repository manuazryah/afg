<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Export;

/**
 * ExportSearch represents the model behind the search form about `common\models\Export`.
 */
class ExportSearch extends Export
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'conignee_id', 'notify_party', 'menifest_consignee', 'status', 'CB', 'UB'], 'integer'],
            [['customer', 'cust_address', 'export_date', 'loding_date', 'broker_name', 'booking_no', 'ETA', 'ar_no', 'xtn_no', 'seal_no', 'container_no', 'cut_off', 'vessel', 'voyage', 'terminal', 'stremship_line', 'destination', 'ITN', 'contact_details', 'special_instruction', 'port_of_loading', 'port_of_discharge', 'bol_note', 'bl_or_awb_number', 'export_referance', 'forwading_agent', 'domestic_routing_instructions', 'pre_carraiage_by', 'place_of_recipt_by_pre_carrrier', 'final_destintion', 'loading_terminal', 'container_type', 'number_of_packages', 'by', 'exporting_carruer', 'date', 'auto_recieving_date', 'auto_cut_off', 'vessel_cut_off', 'sale_date', 'vehicle_location', 'exporter_id', 'exporter_type_issue', 'transpotation_value', 'exporter_dob', 'ultimate_consignee_dob', 'invoice', 'DOC', 'DOU'], 'safe'],
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
        $query = Export::find();

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
            'customer_id' => $this->customer_id,
            'export_date' => $this->export_date,
            'loding_date' => $this->loding_date,
            'ETA' => $this->ETA,
            'cut_off' => $this->cut_off,
            'date' => $this->date,
            'auto_recieving_date' => $this->auto_recieving_date,
            'auto_cut_off' => $this->auto_cut_off,
            'vessel_cut_off' => $this->vessel_cut_off,
            'sale_date' => $this->sale_date,
            'exporter_dob' => $this->exporter_dob,
            'ultimate_consignee_dob' => $this->ultimate_consignee_dob,
            'conignee_id' => $this->conignee_id,
            'notify_party' => $this->notify_party,
            'menifest_consignee' => $this->menifest_consignee,
            'status' => $this->status,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
        ]);

        $query->andFilterWhere(['like', 'customer', $this->customer])
            ->andFilterWhere(['like', 'cust_address', $this->cust_address])
            ->andFilterWhere(['like', 'broker_name', $this->broker_name])
            ->andFilterWhere(['like', 'booking_no', $this->booking_no])
            ->andFilterWhere(['like', 'ar_no', $this->ar_no])
            ->andFilterWhere(['like', 'xtn_no', $this->xtn_no])
            ->andFilterWhere(['like', 'seal_no', $this->seal_no])
            ->andFilterWhere(['like', 'container_no', $this->container_no])
            ->andFilterWhere(['like', 'vessel', $this->vessel])
            ->andFilterWhere(['like', 'voyage', $this->voyage])
            ->andFilterWhere(['like', 'terminal', $this->terminal])
            ->andFilterWhere(['like', 'stremship_line', $this->stremship_line])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'ITN', $this->ITN])
            ->andFilterWhere(['like', 'contact_details', $this->contact_details])
            ->andFilterWhere(['like', 'special_instruction', $this->special_instruction])
            ->andFilterWhere(['like', 'port_of_loading', $this->port_of_loading])
            ->andFilterWhere(['like', 'port_of_discharge', $this->port_of_discharge])
            ->andFilterWhere(['like', 'bol_note', $this->bol_note])
            ->andFilterWhere(['like', 'bl_or_awb_number', $this->bl_or_awb_number])
            ->andFilterWhere(['like', 'export_referance', $this->export_referance])
            ->andFilterWhere(['like', 'forwading_agent', $this->forwading_agent])
            ->andFilterWhere(['like', 'domestic_routing_instructions', $this->domestic_routing_instructions])
            ->andFilterWhere(['like', 'pre_carraiage_by', $this->pre_carraiage_by])
            ->andFilterWhere(['like', 'place_of_recipt_by_pre_carrrier', $this->place_of_recipt_by_pre_carrrier])
            ->andFilterWhere(['like', 'final_destintion', $this->final_destintion])
            ->andFilterWhere(['like', 'loading_terminal', $this->loading_terminal])
            ->andFilterWhere(['like', 'container_type', $this->container_type])
            ->andFilterWhere(['like', 'number_of_packages', $this->number_of_packages])
            ->andFilterWhere(['like', 'by', $this->by])
            ->andFilterWhere(['like', 'exporting_carruer', $this->exporting_carruer])
            ->andFilterWhere(['like', 'vehicle_location', $this->vehicle_location])
            ->andFilterWhere(['like', 'exporter_id', $this->exporter_id])
            ->andFilterWhere(['like', 'exporter_type_issue', $this->exporter_type_issue])
            ->andFilterWhere(['like', 'transpotation_value', $this->transpotation_value])
            ->andFilterWhere(['like', 'invoice', $this->invoice]);

        return $dataProvider;
    }
}
