<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prices".
 *
 * @property int $id
 * @property string $file
 * @property string $month
 * @property int $pricing_type
 * @property int $status
 * @property string $description
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class Prices extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'prices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['pricing_type', 'status', 'CB', 'UB'], 'integer'],
            [['description'], 'string'],
            [['DOC'], 'required'],
            [['DOC', 'DOU'], 'safe'],
            [['month'], 'string', 'max' => 20],
            [['file'], 'required', 'on' => 'create'],
            [['file'], 'file', 'extensions' => 'pdf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'file' => 'File',
            'month' => 'Month',
            'pricing_type' => 'Pricing Type',
            'status' => 'Status',
            'description' => 'Description',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }

}
