<?php

/**
 * This is the model class for table "a_users".
 *
 * The followings are the available columns in table 'a_users':
 * @property string $A_USER_ID
 * @property string $A_EMAIL_ID
 * @property string $A_FIRST_NAME
 * @property string $A_LAST_NAME
 * @property string $A_ADDRESS_1
 * @property string $A_ADDRESS_2
 * @property string $A_CITY
 * @property string $A_STATE
 * @property string $A_ZIP
 * @property string $A_MOBILE_NO
 * @property string $A_OPTIN
 * @property double $A_INDATE
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Users the static model class
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
		return 'a_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('A_INDATE', 'numerical'),
			array('A_EMAIL_ID, A_ADDRESS_1, A_ADDRESS_2', 'length', 'max'=>50),
			array('A_FIRST_NAME, A_LAST_NAME, A_CITY', 'length', 'max'=>25),
			array('A_STATE', 'length', 'max'=>2),
			array('A_ZIP', 'length', 'max'=>10),
			array('A_MOBILE_NO', 'length', 'max'=>15),
			array('A_OPTIN', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('A_USER_ID, A_EMAIL_ID, A_FIRST_NAME, A_LAST_NAME, A_ADDRESS_1, A_ADDRESS_2, A_CITY, A_STATE, A_ZIP, A_MOBILE_NO, A_OPTIN, A_INDATE', 'safe', 'on'=>'search'),
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
			'A_USER_ID' => 'A User',
			'A_EMAIL_ID' => 'A Email',
			'A_FIRST_NAME' => 'A First Name',
			'A_LAST_NAME' => 'A Last Name',
			'A_ADDRESS_1' => 'A Address 1',
			'A_ADDRESS_2' => 'A Address 2',
			'A_CITY' => 'A City',
			'A_STATE' => 'A State',
			'A_ZIP' => 'A Zip',
			'A_MOBILE_NO' => 'A Mobile No',
			'A_OPTIN' => 'A Optin',
			'A_INDATE' => 'A Indate',
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

		$criteria->compare('A_USER_ID',$this->A_USER_ID,true);
		$criteria->compare('A_EMAIL_ID',$this->A_EMAIL_ID,true);
		$criteria->compare('A_FIRST_NAME',$this->A_FIRST_NAME,true);
		$criteria->compare('A_LAST_NAME',$this->A_LAST_NAME,true);
		$criteria->compare('A_ADDRESS_1',$this->A_ADDRESS_1,true);
		$criteria->compare('A_ADDRESS_2',$this->A_ADDRESS_2,true);
		$criteria->compare('A_CITY',$this->A_CITY,true);
		$criteria->compare('A_STATE',$this->A_STATE,true);
		$criteria->compare('A_ZIP',$this->A_ZIP,true);
		$criteria->compare('A_MOBILE_NO',$this->A_MOBILE_NO,true);
		$criteria->compare('A_OPTIN',$this->A_OPTIN,true);
		$criteria->compare('A_INDATE',$this->A_INDATE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}