<?php

/**
 * This is the model class for table "tbl_aa_quote".
 *
 * The followings are the available columns in table 'tbl_aa_quote':
 * @property string $Quote_Id
 * @property string $Quote_Src
 * @property string $Quote_Title
 * @property string $Quote
 * @property string $Quote_Image
 * @property string $Quote_Status
 * @property double $Quote_LastUpdate
 */
class TblAaQuote extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblAaQuote the static model class
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
		return 'tbl_aa_quote';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Quote_Title, Quote_Src, Quote', 'required'),
			array('Quote_LastUpdate', 'numerical'),
			array('Quote_Src', 'length', 'max'=>120),
			array('Quote_Title', 'length', 'max'=>150),
			array('Quote', 'length', 'max'=>250),
			array('Quote_Image', 'length', 'max'=>50),
			array('Quote_Status', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Quote_Id, Quote_Src, Quote_Title, Quote, Quote_Image, Quote_Status, Quote_LastUpdate', 'safe', 'on'=>'search'),
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
			'Quote_Id' => 'Quote',
			'Quote_Src' => 'Quote Author',
			'Quote_Title' => 'Quote Title',
			'Quote' => 'Quote',
			'Quote_Image' => 'Image Upload (107x125) :',
			'Quote_Status' => 'Quote Status',
			'Quote_LastUpdate' => 'Quote Last Update',
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

		$criteria->compare('Quote_Id',$this->Quote_Id,true);
		$criteria->compare('Quote_Src',$this->Quote_Src,true);
		$criteria->compare('Quote_Title',$this->Quote_Title,true);
		$criteria->compare('Quote',$this->Quote,true);
		$criteria->compare('Quote_Image',$this->Quote_Image,true);
		$criteria->compare('Quote_Status',$this->Quote_Status,true);
		$criteria->compare('Quote_LastUpdate',$this->Quote_LastUpdate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}