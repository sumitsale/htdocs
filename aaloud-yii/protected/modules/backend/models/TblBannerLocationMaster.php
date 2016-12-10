<?php

/**
 * This is the model class for table "tbl_banner_location_master".
 *
 * The followings are the available columns in table 'tbl_banner_location_master':
 * @property string $LOCATION_ID
 * @property string $KEY_ID
 * @property string $LOCATION
 * @property string $BANNER_MODULE
 * @property string $BANNER_TITLE
 * @property string $BANNER_WIDTH
 * @property string $BANNER_HEIGHT
 */
class TblBannerLocationMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblBannerLocationMaster the static model class
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
		return 'tbl_banner_location_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KEY_ID', 'length', 'max'=>9),
			array('LOCATION', 'length', 'max'=>15),
			array('BANNER_MODULE, BANNER_TITLE, BANNER_WIDTH, BANNER_HEIGHT', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('LOCATION_ID, KEY_ID, LOCATION, BANNER_MODULE, BANNER_TITLE, BANNER_WIDTH, BANNER_HEIGHT', 'safe', 'on'=>'search'),
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
			'LOCATION_ID' => 'Location',
			'KEY_ID' => 'Key',
			'LOCATION' => 'Location',
			'BANNER_MODULE' => 'Banner Module',
			'BANNER_TITLE' => 'Banner Title',
			'BANNER_WIDTH' => 'Banner Width',
			'BANNER_HEIGHT' => 'Banner Height',
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

		$criteria->compare('LOCATION_ID',$this->LOCATION_ID,true);
		$criteria->compare('KEY_ID',$this->KEY_ID,true);
		$criteria->compare('LOCATION',$this->LOCATION,true);
		$criteria->compare('BANNER_MODULE',$this->BANNER_MODULE,true);
		$criteria->compare('BANNER_TITLE',$this->BANNER_TITLE,true);
		$criteria->compare('BANNER_WIDTH',$this->BANNER_WIDTH,true);
		$criteria->compare('BANNER_HEIGHT',$this->BANNER_HEIGHT,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}