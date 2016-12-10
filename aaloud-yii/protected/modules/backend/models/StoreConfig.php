<?php

/**
 * This is the model class for table "tb1_store_config".
 *
 * The followings are the available columns in table 'tb1_store_config':
 * @property integer $id
 * @property string $name
 * @property string $location
 * @property string $currency
 * @property string $language
 * @property string $website_url
 * @property string $secure_url
 * @property string $website_path
 * @property string $web_del_url
 * @property string $web_license_url
 * @property string $wap_url
 * @property string $temp_folder_path
 * @property string $payment_gateway_url
 * @property string $store_email
 * @property string $sms_header
 * @property string $response_mode
 * @property string $download_count
 * @property string $mooga_host_url
 * @property string $mooga_login
 * @property string $mooga_content
 * @property string $mooga_artist
 * @property string $merchant_id
 * @property string $merchant_password
 * @property string $store_payment_url
 * @property string $aknmai_noti_email
 * @property string $change_password_url
 * @property string $contactus_url_wol
 * @property string $contactus_url_wl
 * @property string $ecoupons
 * @property string $hungama_plays
 * @property string $circle_wise_query
 * @property string $upload_image
 * @property string $created
 * @property string $modified
 */
class StoreConfig extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StoreConfig the static model class
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
		return 'tb1_store_config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, location, currency, language, website_url, secure_url, website_path, web_del_url, web_license_url, wap_url, temp_folder_path, payment_gateway_url, store_email, sms_header, response_mode, download_count, mooga_host_url, mooga_login, mooga_content, mooga_artist, merchant_id, merchant_password, store_payment_url, aknmai_noti_email, change_password_url, contactus_url_wol, contactus_url_wl, ecoupons, hungama_plays, circle_wise_query, upload_image, created, modified', 'required'),
			array('name, location, currency, language, website_url, secure_url, website_path, web_del_url, web_license_url, wap_url, temp_folder_path, payment_gateway_url, store_email, sms_header, response_mode, download_count, mooga_host_url, mooga_login, mooga_content, mooga_artist, merchant_id, merchant_password, store_payment_url, aknmai_noti_email, change_password_url, contactus_url_wol, contactus_url_wl, ecoupons, hungama_plays, circle_wise_query, upload_image', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, location, currency, language, website_url, secure_url, website_path, web_del_url, web_license_url, wap_url, temp_folder_path, payment_gateway_url, store_email, sms_header, response_mode, download_count, mooga_host_url, mooga_login, mooga_content, mooga_artist, merchant_id, merchant_password, store_payment_url, aknmai_noti_email, change_password_url, contactus_url_wol, contactus_url_wl, ecoupons, hungama_plays, circle_wise_query, upload_image, created, modified', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => 'Name',
			'location' => 'Location',
			'currency' => 'Currency',
			'language' => 'Language',
			'website_url' => 'Website Url',
			'secure_url' => 'Secure Url',
			'website_path' => 'Website Path',
			'web_del_url' => 'Web Del Url',
			'web_license_url' => 'Web License Url',
			'wap_url' => 'Wap Url',
			'temp_folder_path' => 'Temp Folder Path',
			'payment_gateway_url' => 'Payment Gateway Url',
			'store_email' => 'Store Email',
			'sms_header' => 'Sms Header',
			'response_mode' => 'Response Mode',
			'download_count' => 'Download Count',
			'mooga_host_url' => 'Mooga Host Url',
			'mooga_login' => 'Mooga Login',
			'mooga_content' => 'Mooga Content',
			'mooga_artist' => 'Mooga Artist',
			'merchant_id' => 'Merchant',
			'merchant_password' => 'Merchant Password',
			'store_payment_url' => 'Store Payment Url',
			'aknmai_noti_email' => 'Aknmai Noti Email',
			'change_password_url' => 'Change Password Url',
			'contactus_url_wol' => 'Contactus Url Wol',
			'contactus_url_wl' => 'Contactus Url Wl',
			'ecoupons' => 'Ecoupons',
			'hungama_plays' => 'Hungama Plays',
			'circle_wise_query' => 'Circle Wise Query',
			'upload_image' => 'Upload Image',
			'created' => 'Created',
			'modified' => 'Modified',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('website_url',$this->website_url,true);
		$criteria->compare('secure_url',$this->secure_url,true);
		$criteria->compare('website_path',$this->website_path,true);
		$criteria->compare('web_del_url',$this->web_del_url,true);
		$criteria->compare('web_license_url',$this->web_license_url,true);
		$criteria->compare('wap_url',$this->wap_url,true);
		$criteria->compare('temp_folder_path',$this->temp_folder_path,true);
		$criteria->compare('payment_gateway_url',$this->payment_gateway_url,true);
		$criteria->compare('store_email',$this->store_email,true);
		$criteria->compare('sms_header',$this->sms_header,true);
		$criteria->compare('response_mode',$this->response_mode,true);
		$criteria->compare('download_count',$this->download_count,true);
		$criteria->compare('mooga_host_url',$this->mooga_host_url,true);
		$criteria->compare('mooga_login',$this->mooga_login,true);
		$criteria->compare('mooga_content',$this->mooga_content,true);
		$criteria->compare('mooga_artist',$this->mooga_artist,true);
		$criteria->compare('merchant_id',$this->merchant_id,true);
		$criteria->compare('merchant_password',$this->merchant_password,true);
		$criteria->compare('store_payment_url',$this->store_payment_url,true);
		$criteria->compare('aknmai_noti_email',$this->aknmai_noti_email,true);
		$criteria->compare('change_password_url',$this->change_password_url,true);
		$criteria->compare('contactus_url_wol',$this->contactus_url_wol,true);
		$criteria->compare('contactus_url_wl',$this->contactus_url_wl,true);
		$criteria->compare('ecoupons',$this->ecoupons,true);
		$criteria->compare('hungama_plays',$this->hungama_plays,true);
		$criteria->compare('circle_wise_query',$this->circle_wise_query,true);
		$criteria->compare('upload_image',$this->upload_image,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}