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
            'front_windshield' => '1 - Front Windshield',
            'bonnet' => '2 - Bonnet',
            'grill' => '3 - Grill',
            'front_bumber' => '4 - Front Bumber',
            'front_head_light' => '5 - Front Head Light',
            'rear_windshield' => '6 - Rear Windshield',
            'truck_door' => '7 - Truck Door',
            'rear_bumber' => '8 - Rear Bumber',
            'rear_bumber_support' => '9 - Rear Bumber Support',
            'tail_lamp' => '10 - Tail Lamp',
            'front_left_fender' => '11 - Front Left Fender',
            'left_front_door' => '12 - Left Front Door',
            'left_rear_door' => '13 - Left Rear Door',
            'left_rear_fender' => '14 - Left Rear Fender',
            'piller' => '15 - Pillar',
            'roof' => '16 - Roof',
            'right_rear_fender' => '17 - Right Rear Fender',
            'right_rear_door' => '18 - Right Rear Door',
            'right_front_door' => '19 - Right Front Door',
            'front_right_fender' => '20 - Front Right Fender',
            'front_tyers' => '21 - Front Tyers',
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
