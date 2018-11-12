<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vehicle".
 *
 * @property int $id
 * @property string $model
 * @property string $make
 * @property string $hat
 * @property string $weight
 * @property string $value
 * @property string $buyer_no
 * @property string $towed_from
 * @property string $lot_no
 * @property string $towed_amount
 * @property string $storage_amount
 * @property int $cheque_no
 * @property int $add_chgs
 * @property string $vin
 * @property string $created_at
 * @property string $updated_at
 * @property string $created_by
 * @property int $status_id
 * @property string $year
 *
 * @property CustomerTowingInfo[] $customerTowingInfos
 * @property TitleInfo[] $titleInfos
 * @property VechicleCondition[] $vechicleConditions
 * @property VehiceCheckOptions[] $vehiceCheckOptions
 * @property VehicleAttachements[] $vehicleAttachements
 */
class Vehicle extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'vehicle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['model', 'make', 'hat', 'weight', 'value', 'status_id', 'year'], 'required'],
            [['cheque_no', 'add_chgs', 'status_id'], 'integer'],
            [['created_at', 'updated_at', 'year', 'attachments','color','title_amount'], 'safe'],
            [['model', 'make', 'hat', 'weight', 'value', 'buyer_no', 'towed_from', 'lot_no', 'towed_amount', 'storage_amount', 'vin', 'created_by'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'make' => 'Make',
            'hat' => 'Hat',
            'weight' => 'Weight',
            'value' => 'Value',
            'buyer_no' => 'Buyer No',
            'towed_from' => 'Towed From',
            'lot_no' => 'Lot No',
            'towed_amount' => 'Towed Amount',
            'storage_amount' => 'Storage Amount',
            'cheque_no' => 'Cheque No',
            'add_chgs' => 'Add Chgs',
            'vin' => 'Vin',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'status_id' => 'Status',
            'year' => 'Year',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTowingInfos() {
        return $this->hasOne(VehicleTowingInfo::className(), ['vehicle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitleInfos() {
        return $this->hasOne(VehicleTitleInfo::className(), ['vehicle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVechicleConditions() {
        return $this->hasOne(VehicleCondition::className(), ['vehicle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiceCheckOptions() {
        return $this->hasOne(VehiceCheckOptions::className(), ['vehicle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    

}
