<?php

/**
 * This is the model class for table "tbl_user_artist_tracks".
 *
 * The followings are the available columns in table 'tbl_user_artist_tracks':
 * @property string $USER_TRACK_ID
 * @property string $USER_ID
 * @property string $TRACK_NAME
 * @property string $TRACK_FILE
 * @property double $TRACK_INDATE
 * @property string $MODERATION_STATUS
 * @property string $MODERATION_COMMENT
 * @property double $LAST_UPDATED
 * @property string $MODERATED_TRACK_FILE
 * @property double $MODERATED_FILE_INDATE
 */
class artisttrack extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return artisttrack the static model class
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
		return 'tbl_user_artist_tracks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TRACK_NAME,TRACK_FILE','required'),
			array('TRACK_INDATE, LAST_UPDATED, MODERATED_FILE_INDATE', 'numerical'),
			array('USER_ID', 'length', 'max'=>20),
			array('TRACK_NAME', 'length', 'max'=>150),
			array('TRACK_FILE, MODERATED_TRACK_FILE', 'length', 'max'=>50),
			array('MODERATION_STATUS', 'length', 'max'=>1),
			array('MODERATION_COMMENT', 'safe'),
			 array('TRACK_FILE', 'file', 'types' => 'mp3'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('USER_TRACK_ID, USER_ID, TRACK_NAME, TRACK_FILE, TRACK_INDATE, MODERATION_STATUS, MODERATION_COMMENT, LAST_UPDATED, MODERATED_TRACK_FILE, MODERATED_FILE_INDATE', 'safe', 'on'=>'search'),
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
			'USER_TRACK_ID' => 'User Track',
			'USER_ID' => 'User',
			'TRACK_NAME' => 'Track Name',
			'TRACK_FILE' => 'Track File',
			'TRACK_INDATE' => 'Track Indate',
			'MODERATION_STATUS' => 'Moderation Status',
			'MODERATION_COMMENT' => 'Moderation Comment',
			'LAST_UPDATED' => 'Last Updated',
			'MODERATED_TRACK_FILE' => 'Moderated Track File',
			'MODERATED_FILE_INDATE' => 'Moderated File Indate',
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

		$criteria->compare('USER_TRACK_ID',$this->USER_TRACK_ID,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('TRACK_NAME',$this->TRACK_NAME,true);
		$criteria->compare('TRACK_FILE',$this->TRACK_FILE,true);
		$criteria->compare('TRACK_INDATE',$this->TRACK_INDATE);
		$criteria->compare('MODERATION_STATUS',$this->MODERATION_STATUS,true);
		$criteria->compare('MODERATION_COMMENT',$this->MODERATION_COMMENT,true);
		$criteria->compare('LAST_UPDATED',$this->LAST_UPDATED);
		$criteria->compare('MODERATED_TRACK_FILE',$this->MODERATED_TRACK_FILE,true);
		$criteria->compare('MODERATED_FILE_INDATE',$this->MODERATED_FILE_INDATE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}