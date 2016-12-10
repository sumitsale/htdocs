<?php

/**
 * This is the model class for table "upc_events".
 *
 * The followings are the available columns in table 'upc_events':
 * @property integer $id
 * @property string $event_name
 * @property string $event_date
 * @property string $event_time
 * @property string $location
 * @property string $city
 * @property string $event_status
 * @property string $created_date
 * @property string $modified_date
 */
class UpcEvents extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UpcEvents the static model class
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
		return 'upc_events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_name, event_date, event_time, location, city', 'required'),
			array('event_name', 'length', 'max'=>200),
			array('url', 'length', 'max'=>1000),
			array('event_time, city', 'length', 'max'=>100),
			array('location,url', 'length', 'max'=>500),
			array('event_status', 'length', 'max'=>2),
			array('created_date, modified_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_name, event_date, event_time, location, city, url, event_status, created_date, modified_date', 'safe', 'on'=>'search'),
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
			'event_name' => 'Event Name',
			'event_date' => 'Event Date',
			'event_time' => 'Event Time',
			'location' => 'Location',
			'city' => 'City',
			'url' => 'Url',
			'event_status' => 'Event Status',
			'created_date' => 'Created Date',
			'modified_date' => 'Modified Date',
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
		$criteria->compare('event_name',$this->event_name,true);
		$criteria->compare('event_date',$this->event_date,true);
		$criteria->compare('event_time',$this->event_time,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('event_status',$this->event_status,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}