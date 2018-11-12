<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vehicle_condition".
 *
 * @property int $id
 * @property string $front_windshield
 * @property string $bonnet
 * @property string $grill
 * @property string $front_bumber
 * @property string $front_head_light
 * @property string $rear_windshield
 * @property string $truck_door
 * @property string $rear_bumber
 * @property string $rear_bumber_support
 * @property string $tail_lamp
 * @property string $front_left_fender
 * @property string $left_front_door
 * @property string $left_rear_door
 * @property string $left_rear_fender
 * @property string $piller
 * @property string $roof
 * @property string $right_rear_fender
 * @property string $right_rear_door
 * @property string $right_front_door
 * @property string $front_right_fender
 * @property string $front_tyers
 * @property string $created_at
 * @property int $vehicle_id
 *
 * @property Vehicle $vehicle
 */
class VehicleCondition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle_condition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['vehicle_id'], 'required'],
            [['vehicle_id'], 'integer'],
            [['front_windshield', 'bonnet', 'grill', 'front_bumber', 'front_head_light', 'rear_windshield', 'truck_door', 'rear_bumber', 'rear_bumber_support', 'tail_lamp', 'front_left_fender', 'left_front_door', 'left_rear_door', 'left_rear_fender', 'piller', 'roof', 'right_rear_fender', 'right_rear_door', 'right_front_door', 'front_right_fender', 'front_tyers'], 'string', 'max' => 45],
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
            'front_windshield' => 'Front Windshield',
            'bonnet' => 'Bonnet',
            'grill' => 'Grill',
            'front_bumber' => 'Front Bumber',
            'front_head_light' => 'Front Head Light',
            'rear_windshield' => 'Rear Windshield',
            'truck_door' => 'Truck Door',
            'rear_bumber' => 'Rear Bumber',
            'rear_bumber_support' => 'Rear Bumber Support',
            'tail_lamp' => 'Tail Lamp',
            'front_left_fender' => 'Front Left Fender',
            'left_front_door' => 'Left Front Door',
            'left_rear_door' => 'Left Rear Door',
            'left_rear_fender' => 'Left Rear Fender',
            'piller' => 'Piller',
            'roof' => 'Roof',
            'right_rear_fender' => 'Right Rear Fender',
            'right_rear_door' => 'Right Rear Door',
            'right_front_door' => 'Right Front Door',
            'front_right_fender' => 'Front Right Fender',
            'front_tyers' => 'Front Tyers',
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
