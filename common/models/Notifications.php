<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property int $id
 * @property string $subject
 * @property string $message
 * @property string $expire_date
 * @property int $CB
 * @property string $DOC
 * @property int $status
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['expire_date', 'DOC'], 'safe'],
            [['CB', 'status'], 'integer'],
            [['subject'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'message' => 'Message',
            'expire_date' => 'Expire Date',
            'CB' => 'C B',
            'DOC' => 'D O C',
            'status' => 'Status',
        ];
    }
}
