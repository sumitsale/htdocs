<?php

/**
 * This is the model class for table "tbl_aa_wap_banner_location_master".
 *
 * The followings are the available columns in table 'tbl_aa_wap_banner_location_master':
 * @property string $LOCATION_ID
 * @property string $LOCATION
 * @property string $BANNER_MODULE
 * @property string $BANNER_TITLE
 * @property string $CREATED
 * @property string $MODIFIED
 */
class TblAaWapBannerLocationMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblAaWapBannerLocationMaster the static model class
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
		return 'tbl_aa_wap_banner_location_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LOCATION, BANNER_MODULE, BANNER_TITLE, CREATED, MODIFIED', 'required'),
			array('LOCATION', 'length', 'max'=>25),
			array('BANNER_MODULE, BANNER_TITLE', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('LOCATION_ID, LOCATION, BANNER_MODULE, BANNER_TITLE, CREATED, MODIFIED', 'safe', 'on'=>'search'),
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
			'LOCATION' => 'Location',
			'BANNER_MODULE' => 'Banner Module',
			'BANNER_TITLE' => 'Banner Title',
			'CREATED' => 'Created',
			'MODIFIED' => 'Modified',
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
		$criteria->compare('LOCATION',$this->LOCATION,true);
		$criteria->compare('BANNER_MODULE',$this->BANNER_MODULE,true);
		$criteria->compare('BANNER_TITLE',$this->BANNER_TITLE,true);
		$criteria->compare('CREATED',$this->CREATED,true);
		$criteria->compare('MODIFIED',$this->MODIFIED,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}