<?php

/**
 * This is the model class for table "tbl_aa_artist".
 *
 * The followings are the available columns in table 'tbl_aa_artist':
 * @property string $Artist_Id
 * @property string $Artist_Name
 * @property string $Artist_Bgcolor
 * @property string $Artist_Bgimage
 * @property string $Artist_Right_Bgcolor
 * @property string $Artist_Right_Bgimage
 * @property string $Artist_WAP_Image
 * @property string $Artist_Twitter
 * @property string $Artist_Facebook
 * @property string $Artist_Flickr
 * @property string $Artist_Caller_Keyword
 * @property string $Artist_Status
 * @property double $Artist_Indate
 * @property double $Artist_LastUpdate
 * @property string $Artist_Hit_Count
 */
class model_tblaaartist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return model_tblaaartist the static model class
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
		return 'tbl_aa_artist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Artist_Indate, Artist_LastUpdate', 'numerical'),
			array('Artist_Id,Artist_Name','required'),
			array('Artist_Twitter,Artist_Facebook,Artist_Flickr','url'),
			array('Artist_Id, Artist_Hit_Count', 'length', 'max'=>20),
			array('Artist_Name', 'length', 'max'=>150),
			array('Artist_Bgcolor, Artist_Right_Bgcolor, Artist_Caller_Keyword', 'length', 'max'=>10),
			array('Artist_Bgimage, Artist_Right_Bgimage, Artist_WAP_Image', 'length', 'max'=>50),
			array('Artist_Twitter, Artist_Facebook, Artist_Flickr', 'length', 'max'=>250),
			array('Artist_Status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Artist_Id, Artist_Name, Artist_Bgcolor, Artist_Bgimage, Artist_Right_Bgcolor, Artist_Right_Bgimage, Artist_WAP_Image, Artist_Twitter, Artist_Facebook, Artist_Flickr, Artist_Caller_Keyword, Artist_Status, Artist_Indate, Artist_LastUpdate, Artist_Hit_Count', 'safe', 'on'=>'search'),
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
			'Artist_Id' => 'Artist',
			'Artist_Name' => 'Artist Name',
			'Artist_Bgcolor' => 'Artist Bgcolor',
			'Artist_Bgimage' => 'Artist Bgimage',
			'Artist_Right_Bgcolor' => 'Artist Right Bgcolor',
			'Artist_Right_Bgimage' => 'Artist Right Bgimage',
			'Artist_WAP_Image' => 'Artist Wap Image',
			'Artist_Twitter' => 'Artist Twitter',
			'Artist_Facebook' => 'Artist Facebook',
			'Artist_Flickr' => 'Artist Flickr',
			'Artist_Caller_Keyword' => 'Artist Caller Keyword',
			'Artist_Status' => 'Artist Status',
			'Artist_Indate' => 'Artist Indate',
			'Artist_LastUpdate' => 'Artist Last Update',
			'Artist_Hit_Count' => 'Artist Hit Count',
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

		$criteria->compare('Artist_Id',$this->Artist_Id,true);
		$criteria->compare('Artist_Name',$this->Artist_Name,true);
		$criteria->compare('Artist_Bgcolor',$this->Artist_Bgcolor,true);
		$criteria->compare('Artist_Bgimage',$this->Artist_Bgimage,true);
		$criteria->compare('Artist_Right_Bgcolor',$this->Artist_Right_Bgcolor,true);
		$criteria->compare('Artist_Right_Bgimage',$this->Artist_Right_Bgimage,true);
		$criteria->compare('Artist_WAP_Image',$this->Artist_WAP_Image,true);
		$criteria->compare('Artist_Twitter',$this->Artist_Twitter,true);
		$criteria->compare('Artist_Facebook',$this->Artist_Facebook,true);
		$criteria->compare('Artist_Flickr',$this->Artist_Flickr,true);
		$criteria->compare('Artist_Caller_Keyword',$this->Artist_Caller_Keyword,true);
		$criteria->compare('Artist_Status',$this->Artist_Status,true);
		$criteria->compare('Artist_Indate',$this->Artist_Indate);
		$criteria->compare('Artist_LastUpdate',$this->Artist_LastUpdate);
		$criteria->compare('Artist_Hit_Count',$this->Artist_Hit_Count,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}