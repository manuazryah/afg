<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "consignee".
 *
 * @property string $id
 * @property string $consignee_name
 * @property int $consignee_id
 * @property string $address1
 * @property string $city
 * @property string $country
 * @property string $phone
 * @property string $address2
 * @property string $state
 * @property string $zipcode
 * @property string $customers_id
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property Customers $customers
 */
class Consignee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consignee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['consignee_id', 'customers_id', 'status', 'CB', 'UB'], 'integer'],
            [['customers_id'], 'required'],
            [['DOC', 'DOU'], 'safe'],
            [['consignee_name', 'address1', 'city', 'country', 'phone', 'address2', 'state', 'zipcode'], 'string', 'max' => 45],
            [['customers_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customers_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'consignee_name' => 'Consignee Name',
            'consignee_id' => 'Consignee ID',
            'address1' => 'Address1',
            'city' => 'City',
            'country' => 'Country',
            'phone' => 'Phone',
            'address2' => 'Address2',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'customers_id' => 'Customers ID',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasOne(Customers::className(), ['id' => 'customers_id']);
    }
}
