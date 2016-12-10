<?php

/**
 * This is the model class for table "TBL_STORE_FRONT".
 *
 * The followings are the available columns in table 'TBL_STORE_FRONT':
 * @property string $STORE_FRONT_ID
 * @property string $STORE_FRONT_NAME
 * @property string $COUNTRY_ID
 * @property string $CURRENCY
 * @property string $LANGUAGE_ID
 * @property string $WEBSITE_URL
 * @property string $WEBSITE_SECURE_URL
 * @property string $WEBSITE_DELIVERY_URL
 * @property string $WEBSITE_LICENCE_URL
 * @property string $WAP_URL
 * @property string $PAYMENT_GATEWAY_URL
 * @property string $STORE_PARENT_URL
 * @property string $MOOGAHOST
 * @property string $MOOGALOGIN
 * @property string $MOOGACONTENT
 * @property string $MOOGAARTIST
 * @property string $WEBSITE_PATH
 * @property string $ADMIN_EMAIL
 * @property string $AKAMAI_NOTIFICATION_URL
 * @property string $TEMPLATE_FOLDER
 * @property integer $MAX_DOWNLOAD_COUNT
 * @property double $CREATED_ON
 * @property string $CREATED_BY
 * @property double $UPDATED_ON
 * @property string $MERCHANT_ID
 * @property string $MERCHANT_PASSWORD
 * @property integer $STATUS
 * @property string $EMAILER_PWD_URL
 * @property string $EMAILER_CONTACT_URL
 * @property string $EMAILER_CONTACTING_URL
 * @property string $SMS_HEADER
 * @property string $RESPONSE_MODE
 * @property string $ECOUPONS
 * @property string $HUNGAMAPLAYS
 * @property string $CIRCLE_WISE_QUERY
 */
class TBLSTOREFRONT extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TBLSTOREFRONT the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_store_front';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MAX_DOWNLOAD_COUNT, STATUS', 'numerical', 'integerOnly'=>true),
			array('CREATED_ON, UPDATED_ON', 'numerical'),
			array('STORE_FRONT_NAME, WEBSITE_URL, WEBSITE_SECURE_URL, WEBSITE_DELIVERY_URL, WEBSITE_LICENCE_URL, WAP_URL, PAYMENT_GATEWAY_URL, STORE_PARENT_URL, MOOGAHOST, MOOGALOGIN, MOOGACONTENT, MOOGAARTIST, WEBSITE_PATH, ADMIN_EMAIL, AKAMAI_NOTIFICATION_URL, TEMPLATE_FOLDER, MERCHANT_ID, MERCHANT_PASSWORD', 'length', 'max'=>100),
			array('COUNTRY_ID', 'length', 'max'=>2),
			array('CURRENCY, SMS_HEADER', 'length', 'max'=>50),
			array('LANGUAGE_ID', 'length', 'max'=>3),
			array('CREATED_BY', 'length', 'max'=>9),
			array('EMAILER_PWD_URL, EMAILER_CONTACT_URL, EMAILER_CONTACTING_URL', 'length', 'max'=>250),
			array('RESPONSE_MODE, ECOUPONS, HUNGAMAPLAYS, CIRCLE_WISE_QUERY', 'length', 'max'=>1),
			array('image','length','max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('STORE_FRONT_ID, STORE_FRONT_NAME, COUNTRY_ID, CURRENCY, LANGUAGE_ID, WEBSITE_URL, WEBSITE_SECURE_URL, WEBSITE_DELIVERY_URL, WEBSITE_LICENCE_URL, WAP_URL, PAYMENT_GATEWAY_URL, STORE_PARENT_URL, MOOGAHOST, MOOGALOGIN, MOOGACONTENT, MOOGAARTIST, WEBSITE_PATH, ADMIN_EMAIL, AKAMAI_NOTIFICATION_URL, TEMPLATE_FOLDER, MAX_DOWNLOAD_COUNT, CREATED_ON, CREATED_BY, UPDATED_ON, MERCHANT_ID, MERCHANT_PASSWORD, STATUS, EMAILER_PWD_URL, EMAILER_CONTACT_URL, EMAILER_CONTACTING_URL, SMS_HEADER, RESPONSE_MODE, ECOUPONS, HUNGAMAPLAYS, CIRCLE_WISE_QUERY', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'STORE_FRONT_ID' => 'Store Front',
			'STORE_FRONT_NAME' => 'Store Front Name',
			'COUNTRY_ID' => 'Country',
			'CURRENCY' => 'Currency',
			'LANGUAGE_ID' => 'Language',
			'WEBSITE_URL' => 'Website Url',
			'WEBSITE_SECURE_URL' => 'Website Secure Url',
			'WEBSITE_DELIVERY_URL' => 'Website Delivery Url',
			'WEBSITE_LICENCE_URL' => 'Website Licence Url',
			'WAP_URL' => 'Wap Url',
			'PAYMENT_GATEWAY_URL' => 'Payment Gateway Url',
			'STORE_PARENT_URL' => 'Store Parent Url',
			'MOOGAHOST' => 'Moogahost',
			'MOOGALOGIN' => 'Moogalogin',
			'MOOGACONTENT' => 'Moogacontent',
			'MOOGAARTIST' => 'Moogaartist',
			'WEBSITE_PATH' => 'Website Path',
			'ADMIN_EMAIL' => 'Admin Email',
			'AKAMAI_NOTIFICATION_URL' => 'Akamai Notification Url',
			'TEMPLATE_FOLDER' => 'Template Folder',
			'MAX_DOWNLOAD_COUNT' => 'Max Download Count',
			'CREATED_ON' => 'Created On',
			'CREATED_BY' => 'Created By',
			'UPDATED_ON' => 'Updated On',
			'MERCHANT_ID' => 'Merchant',
			'MERCHANT_PASSWORD' => 'Merchant Password',
			'STATUS' => 'Status',
			'EMAILER_PWD_URL' => 'Emailer Pwd Url',
			'EMAILER_CONTACT_URL' => 'Emailer Contact Url',
			'EMAILER_CONTACTING_URL' => 'Emailer Contacting Url',
			'SMS_HEADER' => 'Sms Header',
			'RESPONSE_MODE' => 'Response Mode',
			'ECOUPONS' => 'Ecoupons',
			'HUNGAMAPLAYS' => 'Hungamaplays',
			'CIRCLE_WISE_QUERY' => 'Circle Wise Query',
			'image'=>'image',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);
		$criteria->compare('STORE_FRONT_NAME',$this->STORE_FRONT_NAME,true);
		$criteria->compare('COUNTRY_ID',$this->COUNTRY_ID,true);
		$criteria->compare('CURRENCY',$this->CURRENCY,true);
		$criteria->compare('LANGUAGE_ID',$this->LANGUAGE_ID,true);
		$criteria->compare('WEBSITE_URL',$this->WEBSITE_URL,true);
		$criteria->compare('WEBSITE_SECURE_URL',$this->WEBSITE_SECURE_URL,true);
		$criteria->compare('WEBSITE_DELIVERY_URL',$this->WEBSITE_DELIVERY_URL,true);
		$criteria->compare('WEBSITE_LICENCE_URL',$this->WEBSITE_LICENCE_URL,true);
		$criteria->compare('WAP_URL',$this->WAP_URL,true);
		$criteria->compare('PAYMENT_GATEWAY_URL',$this->PAYMENT_GATEWAY_URL,true);
		$criteria->compare('STORE_PARENT_URL',$this->STORE_PARENT_URL,true);
		$criteria->compare('MOOGAHOST',$this->MOOGAHOST,true);
		$criteria->compare('MOOGALOGIN',$this->MOOGALOGIN,true);
		$criteria->compare('MOOGACONTENT',$this->MOOGACONTENT,true);
		$criteria->compare('MOOGAARTIST',$this->MOOGAARTIST,true);
		$criteria->compare('WEBSITE_PATH',$this->WEBSITE_PATH,true);
		$criteria->compare('ADMIN_EMAIL',$this->ADMIN_EMAIL,true);
		$criteria->compare('AKAMAI_NOTIFICATION_URL',$this->AKAMAI_NOTIFICATION_URL,true);
		$criteria->compare('TEMPLATE_FOLDER',$this->TEMPLATE_FOLDER,true);
		$criteria->compare('MAX_DOWNLOAD_COUNT',$this->MAX_DOWNLOAD_COUNT);
		$criteria->compare('CREATED_ON',$this->CREATED_ON);
		$criteria->compare('CREATED_BY',$this->CREATED_BY,true);
		$criteria->compare('UPDATED_ON',$this->UPDATED_ON);
		$criteria->compare('MERCHANT_ID',$this->MERCHANT_ID,true);
		$criteria->compare('MERCHANT_PASSWORD',$this->MERCHANT_PASSWORD,true);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('EMAILER_PWD_URL',$this->EMAILER_PWD_URL,true);
		$criteria->compare('EMAILER_CONTACT_URL',$this->EMAILER_CONTACT_URL,true);
		$criteria->compare('EMAILER_CONTACTING_URL',$this->EMAILER_CONTACTING_URL,true);
		$criteria->compare('SMS_HEADER',$this->SMS_HEADER,true);
		$criteria->compare('RESPONSE_MODE',$this->RESPONSE_MODE,true);
		$criteria->compare('ECOUPONS',$this->ECOUPONS,true);
		$criteria->compare('HUNGAMAPLAYS',$this->HUNGAMAPLAYS,true);
		$criteria->compare('CIRCLE_WISE_QUERY',$this->CIRCLE_WISE_QUERY,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}