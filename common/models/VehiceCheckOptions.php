<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vehice_check_options".
 *
 * @property int $id
 * @property int $keys
 * @property int $cd_changer
 * @property int $gps_navigation_system
 * @property int $spare_tire_jack
 * @property int $wheel_covers
 * @property int $radio
 * @property int $cd_player
 * @property int $mirror
 * @property int $speaker
 * @property int $other
 * @property string $created_at
 * @property int $vehicle_id
 *
 * @property Vehicle $vehicle
 */
class VehiceCheckOptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehice_check_options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keys', 'cd_changer', 'gps_navigation_system', 'spare_tire_jack', 'wheel_covers', 'radio', 'cd_player', 'mirror', 'speaker', 'other', 'vehicle_id'], 'integer'],
            [['created_at'], 'safe'],
            [['vehicle_id'], 'required'],
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
            'keys' => 'Keys',
            'cd_changer' => 'Cd Changer',
            'gps_navigation_system' => 'Gps Navigation System',
            'spare_tire_jack' => 'Spare Tire Jack',
            'wheel_covers' => 'Wheel Covers',
            'radio' => 'Radio',
            'cd_player' => 'Cd Player',
            'mirror' => 'Mirror',
            'speaker' => 'Speaker',
            'other' => 'Other',
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
