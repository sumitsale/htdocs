<?php

/**
 * This is the model class for table "signup".
 *
 * The followings are the available columns in table 'signup':
 * @property integer $id
 * @property string $type
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property integer $mobile
 * @property double $age
 * @property string $city
 * @property string $country
 * @property string $gender
 */
class Signup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Signup the static model class
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
		return 'signup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, first_name, last_name, email, mobile, age, city, country', 'required'),
			array('mobile', 'numerical', 'integerOnly'=>true),
			array('age', 'numerical'),
			array('type, first_name, last_name, email, city, country', 'length', 'max'=>50),
			array('gender', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, first_name, last_name, email, mobile, age, city, country, gender', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'mobile' => 'Mobile',
			'age' => 'Age',
			'city' => 'City',
			'country' => 'Country',
			'gender' => 'Gender',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('mobile',$this->mobile);
		$criteria->compare('age',$this->age);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('gender',$this->gender,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}