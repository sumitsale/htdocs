<?php

/**
 * This is the model class for table "tbl_user_profile".
 *
 * The followings are the available columns in table 'tbl_user_profile':
 * @property string $USER_ID
 * @property string $NICK_NAME
 * @property string $PROFILE_IMAGE
 * @property string $ABOUT_YOU
 * @property string $MUSIC_YOU_LIKE
 * @property string $FAV_ARTIST
 * @property double $LAST_UPDATED
 */
class UserProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserProfile the static model class
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
		return 'tbl_user_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LAST_UPDATED', 'numerical'),
			array('USER_ID', 'length', 'max'=>20),
			array('NICK_NAME', 'length', 'max'=>25),
			array('PROFILE_IMAGE', 'length', 'max'=>50),
			array('ABOUT_YOU, MUSIC_YOU_LIKE, FAV_ARTIST', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('USER_ID, NICK_NAME, PROFILE_IMAGE, ABOUT_YOU, MUSIC_YOU_LIKE, FAV_ARTIST, LAST_UPDATED', 'safe', 'on'=>'search'),
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
			'USER_ID' => 'User',
			'NICK_NAME' => 'Nick Name',
			'PROFILE_IMAGE' => 'Profile Image',
			'ABOUT_YOU' => 'About You',
			'MUSIC_YOU_LIKE' => 'Music You Like',
			'FAV_ARTIST' => 'Fav Artist',
			'LAST_UPDATED' => 'Last Updated',
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

		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('NICK_NAME',$this->NICK_NAME,true);
		$criteria->compare('PROFILE_IMAGE',$this->PROFILE_IMAGE,true);
		$criteria->compare('ABOUT_YOU',$this->ABOUT_YOU,true);
		$criteria->compare('MUSIC_YOU_LIKE',$this->MUSIC_YOU_LIKE,true);
		$criteria->compare('FAV_ARTIST',$this->FAV_ARTIST,true);
		$criteria->compare('LAST_UPDATED',$this->LAST_UPDATED);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}