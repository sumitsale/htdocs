<?php

/**
 * This is the model class for table "tbl_user_artist".
 *
 * The followings are the available columns in table 'tbl_user_artist':
 * @property string $USER_ID
 * @property string $USER_TYPE
 * @property string $BAND_NAME
 * @property string $GENRE
 * @property string $BIO
 * @property string $INSPIRATION
 * @property string $META_ARTIST_ID
 * @property string $USER_AGE
 * @property string $USER_GENDER
 * @property string $USER_CITY
 * @property string $USER_COUNTRY
 * @property double $LAST_UPDATED
 */
class userartist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return userartist the static model class
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
		return 'tbl_user_artist';
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
			array('USER_ID, META_ARTIST_ID', 'length', 'max'=>20),
			array('USER_TYPE, USER_GENDER', 'length', 'max'=>1),
			array('BAND_NAME, GENRE', 'length', 'max'=>150),
			array('USER_AGE, USER_COUNTRY', 'length', 'max'=>3),
			array('USER_CITY', 'length', 'max'=>50),
			array('BIO, INSPIRATION', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('USER_ID, USER_TYPE, BAND_NAME, GENRE, BIO, INSPIRATION, META_ARTIST_ID, USER_AGE, USER_GENDER, USER_CITY, USER_COUNTRY, LAST_UPDATED', 'safe', 'on'=>'search'),
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
			'USER_TYPE' => 'User Type',
			'BAND_NAME' => 'Band Name',
			'GENRE' => 'Genre',
			'BIO' => 'Bio',
			'INSPIRATION' => 'Inspiration',
			'META_ARTIST_ID' => 'Meta Artist',
			'USER_AGE' => 'User Age',
			'USER_GENDER' => 'User Gender',
			'USER_CITY' => 'User City',
			'USER_COUNTRY' => 'User Country',
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
		$criteria->compare('USER_TYPE',$this->USER_TYPE,true);
		$criteria->compare('BAND_NAME',$this->BAND_NAME,true);
		$criteria->compare('GENRE',$this->GENRE,true);
		$criteria->compare('BIO',$this->BIO,true);
		$criteria->compare('INSPIRATION',$this->INSPIRATION,true);
		$criteria->compare('META_ARTIST_ID',$this->META_ARTIST_ID,true);
		$criteria->compare('USER_AGE',$this->USER_AGE,true);
		$criteria->compare('USER_GENDER',$this->USER_GENDER,true);
		$criteria->compare('USER_CITY',$this->USER_CITY,true);
		$criteria->compare('USER_COUNTRY',$this->USER_COUNTRY,true);
		$criteria->compare('LAST_UPDATED',$this->LAST_UPDATED);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}