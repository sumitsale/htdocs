<?php

/**
 * This is the model class for table "tbl_location_master".
 *
 * The followings are the available columns in table 'tbl_location_master':
 * @property string $location_id
 * @property string $page_id
 * @property string $location_desc
 * @property string $location_current_title
 * @property string $location_current_subtitle
 * @property integer $automatic
 * @property integer $iscategory
 */
class TblLocationMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblLocationMaster the static model class
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
		return 'tbl_location_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_id', 'required'),
			array('automatic, iscategory', 'numerical', 'integerOnly'=>true),
			array('page_id', 'length', 'max'=>9),
			array('location_desc, location_current_title, location_current_subtitle', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('location_id, page_id, location_desc, location_current_title, location_current_subtitle, automatic, iscategory', 'safe', 'on'=>'search'),
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
			'location_id' => 'Location',
			'page_id' => 'Page',
			'location_desc' => 'Location Desc',
			'location_current_title' => 'Location Current Title',
			'location_current_subtitle' => 'Location Current Subtitle',
			'automatic' => 'Automatic',
			'iscategory' => 'Iscategory',
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

		$criteria->compare('location_id',$this->location_id,true);
		$criteria->compare('page_id',$this->page_id,true);
		$criteria->compare('location_desc',$this->location_desc,true);
		$criteria->compare('location_current_title',$this->location_current_title,true);
		$criteria->compare('location_current_subtitle',$this->location_current_subtitle,true);
		$criteria->compare('automatic',$this->automatic);
		$criteria->compare('iscategory',$this->iscategory);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}