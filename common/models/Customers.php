<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

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
class Customers extends ActiveRecord implements IdentityInterface {

    private $_user;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['customer_id', 'email', 'name', 'company_name', 'user_name', 'password'], 'required', 'on' => 'create'],
            [['address1', 'other_emails', 'address2', 'notes'], 'string'],
            [['created_at', 'DOC', 'DOU', 'user_name', 'upload_documents', 'password'], 'safe'],
            [['status', 'CB', 'UB'], 'integer'],
            [['customer_id'], 'string', 'max' => 255],
            [['name', 'phone_usa', 'trn_usa', 'country', 'state', 'company_name', 'phone_uae', 'trn_uae', 'city', 'zipcode'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 150],
            [['fax'], 'string', 'max' => 100],
            [['user_name', 'password'], 'required', 'on' => 'login'],
            [['password'], 'validatePassword', 'on' => 'login'],
            [['user_name'], 'unique', 'on' => 'create'],
            [['customer_id'], 'unique', 'on' => 'create']
        ];
    }

    public function validatePassword($attribute, $params) {

        if (!$this->hasErrors()) {

            $user = $this->getUser();
            if (!$user || !Yii::$app->security->validatePassword($this->password, $user->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
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
    public function getConsignees() {
        return $this->hasMany(Consignee::className(), ['customers_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerTowingInfos() {
        return $this->hasMany(CustomerTowingInfo::className(), ['customers_id' => 'id']);
    }

    public function login() {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), /* $this->rememberMe ? 3600 * 24 * 30 : */ 0);
        } else {
            return false;
        }
    }

    protected function getUser() {

        if ($this->_user === null) {
            $this->_user = static::find()->where('user_name = :uname and status = :stat', ['uname' => $this->user_name, 'stat' => '1'])->one();
        }
        return $this->_user;
    }

    public function validatedata($data) {
        if ($data == '') {
            $this->addError('password', 'Incorrect username or password');
            return true;
        }
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['user_name' => $username, 'status' => 1]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => 1]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

}
