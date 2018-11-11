<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property string $id
 * @property string $customer_id
 * @property string $name
 * @property string $email
 * @property string $phone_usa
 * @property string $trn_usa
 * @property string $address1
 * @property string $country
 * @property string $state
 * @property string $other_emails
 * @property string $upload_documents
 * @property string $company_name
 * @property string $phone_uae
 * @property string $trn_uae
 * @property string $address2
 * @property string $city
 * @property string $zipcode
 * @property string $fax
 * @property string $notes
 * @property string $created_at
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property Consignee[] $consignees
 * @property CustomerTowingInfo[] $customerTowingInfos
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address1', 'other_emails', 'address2', 'notes'], 'string'],
            [['created_at', 'DOC', 'DOU'], 'safe'],
            [['status', 'CB', 'UB'], 'integer'],
            [['customer_id'], 'string', 'max' => 255],
            [['name', 'phone_usa', 'trn_usa', 'country', 'state', 'upload_documents', 'company_name', 'phone_uae', 'trn_uae', 'city', 'zipcode'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 150],
            [['fax'], 'string', 'max' => 100],
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
            'name' => 'Name',
            'email' => 'Email',
            'phone_usa' => 'Phone Usa',
            'trn_usa' => 'Trn Usa',
            'address1' => 'Address1',
            'country' => 'Country',
            'state' => 'State',
            'other_emails' => 'Other Emails',
            'upload_documents' => 'Upload Documents',
            'company_name' => 'Company Name',
            'phone_uae' => 'Phone Uae',
            'trn_uae' => 'Trn Uae',
            'address2' => 'Address2',
            'city' => 'City',
            'zipcode' => 'Zipcode',
            'fax' => 'Fax',
            'notes' => 'Notes',
            'created_at' => 'Created At',
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
    public function getConsignees()
    {
        return $this->hasMany(Consignee::className(), ['customers_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerTowingInfos()
    {
        return $this->hasMany(CustomerTowingInfo::className(), ['customers_id' => 'id']);
    }
}
