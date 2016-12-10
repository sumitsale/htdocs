<?php

/**
 * This is the model class for table "tbl_homepage_popup".
 *
 * The followings are the available columns in table 'tbl_homepage_popup':
 * @property string $id
 * @property string $artist_id
 * @property string $artist_name
 * @property string $image
 * @property string $video_id
 * @property string $video_url
 * @property string $ipad_url
 * @property string $event_url
 * @property string $status
 * @property string $toptitle
 * @property string $bottomtitle
 * @property string $type
 */
class TblHomepagePopup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblHomepagePopup the static model class
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
		return 'tbl_homepage_popup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('artist_id, artist_name, image, video_id, video_url, ipad_url, event_url, status, toptitle, bottomtitle, type', 'required'),
			array('artist_id, video_id', 'length', 'max'=>20),
			array('artist_name, image, toptitle, bottomtitle', 'length', 'max'=>512),
			array('video_url, ipad_url, event_url', 'length', 'max'=>1000),
			array('status', 'length', 'max'=>10),
			array('type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, artist_id, artist_name, image, video_id, video_url, ipad_url, event_url, status, toptitle, bottomtitle, type', 'safe', 'on'=>'search'),
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
			'artist_id' => 'Artist',
			'artist_name' => 'Artist Name',
			'image' => 'Image',
			'video_id' => 'Video',
			'video_url' => 'Video Url',
			'ipad_url' => 'Ipad Url',
			'event_url' => 'Event Url',
			'status' => 'Status',
			'toptitle' => 'Toptitle',
			'bottomtitle' => 'Bottomtitle',
			'type' => 'Type',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('artist_id',$this->artist_id,true);
		$criteria->compare('artist_name',$this->artist_name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('video_id',$this->video_id,true);
		$criteria->compare('video_url',$this->video_url,true);
		$criteria->compare('ipad_url',$this->ipad_url,true);
		$criteria->compare('event_url',$this->event_url,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('toptitle',$this->toptitle,true);
		$criteria->compare('bottomtitle',$this->bottomtitle,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}