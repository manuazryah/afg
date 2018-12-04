<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vehicle_title_info".
 *
 * @property int $id
 * @property string $title
 * @property string $title_type
 * @property string $title_received
 * @property string $title_no
 * @property string $title_state
 * @property string $towing_request_date
 * @property string $deliver_date
 * @property string $note
 * @property string $created_at
 * @property int $vehicle_id
 *
 * @property Vehicle $vehicle
 */
class VehicleTitleInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle_title_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_received', 'towing_request_date', 'deliver_date', 'created_at'], 'safe'],
            [['note'], 'string'],
            [['vehicle_id'], 'required'],
            [['vehicle_id'], 'integer'],
            [['title', 'title_type', 'title_no', 'title_state'], 'string', 'max' => 45],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicle::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'title_type' => 'Title Type',
            'title_received' => 'Title Received',
            'title_no' => 'Title No',
            'title_state' => 'Title State',
            'towing_request_date' => 'Towing Request Date',
            'deliver_date' => 'Delivery Date',
            'note' => 'Note',
            'created_at' => 'Created At',
            'vehicle_id' => 'Vehicle ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicle::className(), ['id' => 'vehicle_id']);
    }
}
