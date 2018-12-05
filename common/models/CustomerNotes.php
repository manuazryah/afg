<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer_notes".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $vehicle_id
 * @property string $notes
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class CustomerNotes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_notes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'vehicle_id', 'status', 'CB', 'UB'], 'integer'],
            [['notes'], 'string'],
            [['DOC', 'DOU'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'vehicle_id' => 'Vehicle ID',
            'notes' => 'Notes',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }
}
