<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "export".
 *
 * @property int $id
 * @property string $vehicle_id
 * @property string $customer
 * @property int $customer_id
 * @property string $cust_address
 * @property string $export_date
 * @property string $loding_date
 * @property string $broker_name
 * @property string $booking_no
 * @property string $ETA
 * @property string $ar_no
 * @property string $xtn_no
 * @property string $seal_no
 * @property string $container_no
 * @property string $cut_off
 * @property string $vessel
 * @property string $voyage
 * @property string $terminal
 * @property string $stremship_line
 * @property string $destination
 * @property string $ITN
 * @property string $contact_details
 * @property string $special_instruction
 * @property string $port_of_loading
 * @property string $port_of_discharge
 * @property string $bol_note
 * @property int $additional_info_container_type
 * @property string $bl_or_awb_number
 * @property string $export_referance
 * @property string $forwading_agent
 * @property string $domestic_routing_instructions
 * @property string $pre_carraiage_by
 * @property string $place_of_recipt_by_pre_carrrier
 * @property string $final_destintion
 * @property string $loading_terminal
 * @property string $container_type
 * @property string $number_of_packages
 * @property string $by
 * @property string $exporting_carruer
 * @property string $date
 * @property string $auto_recieving_date
 * @property string $auto_cut_off
 * @property string $vessel_cut_off
 * @property string $sale_date
 * @property string $vehicle_location
 * @property string $exporter_id
 * @property string $exporter_type_issue
 * @property string $transpotation_value
 * @property string $exporter_dob
 * @property string $ultimate_consignee_dob
 * @property int $conignee_id
 * @property int $notify_party
 * @property int $menifest_consignee
 * @property string $invoice
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property ContainerImage[] $containerImages
 */
class Export extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public $container_images;

    public static function tableName() {
        return 'export';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['customer', 'customer_id'], 'required'],
            [['customer_id', 'additional_info_container_type', 'conignee_id', 'notify_party', 'menifest_consignee', 'status', 'CB', 'UB'], 'integer'],
            [['cust_address', 'contact_details', 'special_instruction', 'forwading_agent', 'domestic_routing_instructions'], 'string'],
            [['export_date', 'loding_date', 'ETA', 'cut_off', 'date', 'auto_recieving_date', 'auto_cut_off', 'vessel_cut_off', 'sale_date', 'exporter_dob', 'ultimate_consignee_dob', 'DOC', 'DOU', 'vehicle_id', 'container_images', 'oti_no'], 'safe'],
            [['customer', 'broker_name'], 'string', 'max' => 80],
            [['invoice'], 'file', 'extensions' => 'jpg,png,jpeg,pdf'],
            [['booking_no', 'ar_no', 'xtn_no', 'seal_no', 'container_no', 'vessel', 'voyage', 'terminal', 'stremship_line', 'destination', 'ITN', 'port_of_loading', 'port_of_discharge', 'bol_note', 'bl_or_awb_number', 'export_referance', 'pre_carraiage_by', 'place_of_recipt_by_pre_carrrier', 'final_destintion', 'loading_terminal', 'container_type', 'number_of_packages', 'by', 'exporting_carruer', 'vehicle_location', 'exporter_id', 'exporter_type_issue', 'transpotation_value', 'invoice'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'vehicle_id' => 'Vehicle',
            'customer' => 'Customer',
            'customer_id' => 'Customer ID',
            'cust_address' => 'Customer Address',
            'export_date' => 'Export Date',
            'loding_date' => 'Loding Date',
            'broker_name' => 'Broker Name',
            'booking_no' => 'Booking No',
            'oti_no' => 'OTI Number',
            'ETA' => 'ETA',
            'ar_no' => 'Ar No',
            'xtn_no' => 'Xtn No',
            'seal_no' => 'Seal No',
            'container_no' => 'Container No',
            'cut_off' => 'Cut Off',
            'vessel' => 'Vessel',
            'voyage' => 'Voyage',
            'terminal' => 'Terminal',
            'stremship_line' => 'Stremship Line',
            'destination' => 'Destination',
            'ITN' => 'ITN',
            'contact_details' => 'Contact Details',
            'special_instruction' => 'Special Instruction',
            'port_of_loading' => 'Port Of Loading',
            'port_of_discharge' => 'Port Of Discharge',
            'bol_note' => 'Bol Note',
            'additional_info_container_type' => 'Container Type',
            'bl_or_awb_number' => 'Bl Or Awb Number',
            'export_referance' => 'Export Referance',
            'forwading_agent' => 'Forwading Agent',
            'domestic_routing_instructions' => 'Domestic Routing Instructions',
            'pre_carraiage_by' => 'Pre Carraiage By',
            'place_of_recipt_by_pre_carrrier' => 'Place Of Recipt By Pre Carrrier',
            'final_destintion' => 'Final Destination',
            'loading_terminal' => 'Loading Terminal',
            'container_type' => 'Container Type',
            'number_of_packages' => 'Number Of Packages',
            'by' => 'By',
            'exporting_carruer' => 'Exporting Carrier',
            'date' => 'Date',
            'auto_recieving_date' => 'Auto Recieving Date',
            'auto_cut_off' => 'Auto Cut Off',
            'vessel_cut_off' => 'Vessel Cut Off',
            'sale_date' => 'Sale Date',
            'vehicle_location' => 'Vehicle Location',
            'exporter_id' => 'Exporter ID',
            'exporter_type_issue' => 'Exporter Type Issue',
            'transpotation_value' => 'Transportation Value',
            'exporter_dob' => 'Exporter Dob',
            'ultimate_consignee_dob' => 'Ultimate Consignee Dob',
            'conignee_id' => 'Consignee',
            'notify_party' => 'Notify Party',
            'menifest_consignee' => 'Menifest Consignee',
            'invoice' => 'Invoice',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContainerImages() {
        return $this->hasMany(ContainerImage::className(), ['export_id' => 'id']);
    }

}
