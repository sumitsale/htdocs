<?php

/**
 * This is the model class for table "tbl_aa_press".
 *
 * The followings are the available columns in table 'tbl_aa_press':
 * @property string $Press_id
 * @property string $Press_Artist_id
 * @property string $Press_News_Type
 * @property string $Press_News_Title
 * @property string $Press_News_Date
 * @property string $Press_News_Source
 * @property string $Press_News_Content
 * @property string $Press_News_Featured
 * @property string $Press_News_Exclusive
 * @property string $Press_News_Status
 * @property double $Press_Indate
 * @property double $Press_LastUpdate
 */
class TblAaPress extends CActiveRecord
{
	public $description;
	public $description1;
	public $description2;

	/**
	 * Returns the static model of the specified AR class.
	 * @return TblAaPress the static model class
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
		return 'tbl_aa_press';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Press_News_Title,Press_Artist_id', 'required'),
			array('Press_Indate, Press_LastUpdate', 'numerical'),
			array('Press_Artist_id', 'length', 'max'=>20),
			array('Press_News_Type', 'length', 'max'=>1),
			array('Press_News_Title', 'length', 'max'=>250),
			array('Press_News_Source', 'length', 'max'=>100),
			array('Press_News_Status', 'length', 'max'=>2),
			array('Press_News_Date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Press_id, Press_Artist_id, Press_News_Type, Press_News_Title, Press_News_Date, Press_News_Source, Press_News_Content, Press_News_Featured, Press_News_Exclusive, Press_News_Status, Press_Indate, Press_LastUpdate', 'safe', 'on'=>'search'),
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
			'Press_id' => 'Press',
			'Press_Artist_id' => 'Press Artist',
			'Press_News_Type' => 'Press News Type',
			'Press_News_Title' => 'Press News Title',
			'Press_News_Date' => 'Press News Date',
			'Press_News_Source' => 'Press News Source',
			'Press_News_Content' => 'Press News Content',
			'Press_News_Featured' => 'Press News Featured',
			'Press_News_Exclusive' => 'Press News Exclusive',
			'Press_News_Status' => 'Press News Status',
			'Press_Indate' => 'Press Indate',
			'Press_LastUpdate' => 'Press Last Update',
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

		$criteria->compare('Press_id',$this->Press_id,true);
		$criteria->compare('Press_Artist_id',$this->Press_Artist_id,true);
		$criteria->compare('Press_News_Type',$this->Press_News_Type,true);
		$criteria->compare('Press_News_Title',$this->Press_News_Title,true);
		$criteria->compare('Press_News_Date',$this->Press_News_Date,true);
		$criteria->compare('Press_News_Source',$this->Press_News_Source,true);
		$criteria->compare('Press_News_Content',$this->Press_News_Content,true);
		$criteria->compare('Press_News_Featured',$this->Press_News_Featured,true);
		$criteria->compare('Press_News_Exclusive',$this->Press_News_Exclusive,true);
		$criteria->compare('Press_News_Status',$this->Press_News_Status,true);
		$criteria->compare('Press_Indate',$this->Press_Indate);
		$criteria->compare('Press_LastUpdate',$this->Press_LastUpdate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}