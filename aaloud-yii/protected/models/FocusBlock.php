<?php

/**
 * This is the model class for table "tbl_focus_block".
 *
 * The followings are the available columns in table 'tbl_focus_block':
 * @property integer $ID
 * @property integer $ARTIST_ID
 * @property string $ARTIST_NAME
 * @property integer $VIDEO_ID
 * @property string $VIDEO_URL
 * @property string $VIDEO_URL2
 * @property string $EVENT_URL
 * @property string $DESCRIPTION
 * @property string $VIDEO_BIG_IMAGE
 * @property string $VIDEO_THUMBNAIL
 * @property string $EVENT_BIG_IMAGE
 * @property string $EVENT_THUMBNAIL
 * @property integer $POSITION
 * @property string $TYPE
 */
class FocusBlock extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FocusBlock the static model class
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
		return 'tbl_focus_block';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ARTIST_NAME', 'required'),
			array('ARTIST_ID, VIDEO_ID, POSITION', 'numerical', 'integerOnly'=>true),
			array('ARTIST_NAME, DESCRIPTION, EVENT_BIG_IMAGE, EVENT_THUMBNAIL', 'length', 'max'=>512),
			array('VIDEO_URL', 'length', 'max'=>256),
			array('VIDEO_URL2, EVENT_URL, VIDEO_BIG_IMAGE, VIDEO_THUMBNAIL', 'length', 'max'=>1000),
			array('TYPE', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, ARTIST_ID, ARTIST_NAME, VIDEO_ID, VIDEO_URL, VIDEO_URL2, EVENT_URL, DESCRIPTION, VIDEO_BIG_IMAGE, VIDEO_THUMBNAIL, EVENT_BIG_IMAGE, EVENT_THUMBNAIL, POSITION, TYPE', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'ARTIST_ID' => 'Artist',
			'ARTIST_NAME' => 'Artist Name',
			'VIDEO_ID' => 'Video',
			'VIDEO_URL' => 'Video Url',
			'VIDEO_URL2' => 'Video Url2',
			'EVENT_URL' => 'Event Url',
			'DESCRIPTION' => 'Description',
			'VIDEO_BIG_IMAGE' => 'Video Big Image',
			'VIDEO_THUMBNAIL' => 'Video Thumbnail',
			'EVENT_BIG_IMAGE' => 'Event Big Image',
			'EVENT_THUMBNAIL' => 'Event Thumbnail',
			'POSITION' => 'Position',
			'TYPE' => 'Type',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('ARTIST_ID',$this->ARTIST_ID);
		$criteria->compare('ARTIST_NAME',$this->ARTIST_NAME,true);
		$criteria->compare('VIDEO_ID',$this->VIDEO_ID);
		$criteria->compare('VIDEO_URL',$this->VIDEO_URL,true);
		$criteria->compare('VIDEO_URL2',$this->VIDEO_URL2,true);
		$criteria->compare('EVENT_URL',$this->EVENT_URL,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('VIDEO_BIG_IMAGE',$this->VIDEO_BIG_IMAGE,true);
		$criteria->compare('VIDEO_THUMBNAIL',$this->VIDEO_THUMBNAIL,true);
		$criteria->compare('EVENT_BIG_IMAGE',$this->EVENT_BIG_IMAGE,true);
		$criteria->compare('EVENT_THUMBNAIL',$this->EVENT_THUMBNAIL,true);
		$criteria->compare('POSITION',$this->POSITION);
		$criteria->compare('TYPE',$this->TYPE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}