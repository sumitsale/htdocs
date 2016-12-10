<?php

/**
 * This is the model class for table "tbl_home_video".
 *
 * The followings are the available columns in table 'tbl_home_video':
 * @property integer $VIDEO_ID
 * @property string $VIDEO_ARTIST_TITLE
 * @property string $VIDEO_FILE
 * @property string $VIDEO_DESC
 * @property string $VIDEO_IMAGE
 * @property double $VIDEO_INDATE
 * @property string $VIDEO_STATUS
 */
class TblHomeVideo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblHomeVideo the static model class
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
		return 'tbl_home_video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('VIDEO_ARTIST_TITLE, VIDEO_FILE', 'required'),
			array('VIDEO_INDATE', 'numerical'),
			array('VIDEO_ARTIST_TITLE, VIDEO_IMAGE', 'length', 'max'=>50),
			array('VIDEO_FILE', 'length', 'max'=>150),
			array('VIDEO_DESC', 'length', 'max'=>250),
			array('VIDEO_STATUS', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('VIDEO_ID, VIDEO_ARTIST_TITLE, VIDEO_FILE, VIDEO_DESC, VIDEO_IMAGE, VIDEO_INDATE, VIDEO_STATUS', 'safe', 'on'=>'search'),
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
			'VIDEO_ID' => 'Video',
			'VIDEO_ARTIST_TITLE' => 'Artist Name',
			'VIDEO_FILE' => 'Video Path',
			'VIDEO_DESC' => 'Video Desc',
			'VIDEO_IMAGE' => 'Image Upload (107x125):',
			'VIDEO_INDATE' => 'Video Indate',
			'VIDEO_STATUS' => 'Video Status',
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

		$criteria->compare('VIDEO_ID',$this->VIDEO_ID);
		$criteria->compare('VIDEO_ARTIST_TITLE',$this->VIDEO_ARTIST_TITLE,true);
		$criteria->compare('VIDEO_FILE',$this->VIDEO_FILE,true);
		$criteria->compare('VIDEO_DESC',$this->VIDEO_DESC,true);
		$criteria->compare('VIDEO_IMAGE',$this->VIDEO_IMAGE,true);
		$criteria->compare('VIDEO_INDATE',$this->VIDEO_INDATE);
		$criteria->compare('VIDEO_STATUS',$this->VIDEO_STATUS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}