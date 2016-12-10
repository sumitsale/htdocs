<?php

/**
 * This is the model class for table "tbl_artist_master".
 *
 * The followings are the available columns in table 'tbl_artist_master':
 * @property string $id
 * @property string $title
 * @property string $artist_type
 * @property integer $is_celebrity
 * @property integer $is_primary
 * @property string $img_175x175
 * @property string $img_185x100
 * @property string $img_600x400
 * @property string $img_800x600
 * @property string $img_1024x768
 * @property string $dob_date
 * @property double $user_rating
 * @property string $user_rating_count
 * @property string $added_on
 */
class TblArtistMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblArtistMaster the static model class
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
		return 'tbl_artist_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, title, artist_type, added_on', 'required'),
			array('is_celebrity, is_primary', 'numerical', 'integerOnly'=>true),
			array('user_rating', 'numerical'),
			array('id, user_rating_count', 'length', 'max'=>10),
			array('title', 'length', 'max'=>128),
			array('artist_type', 'length', 'max'=>1),
			array('img_175x175, img_185x100, img_600x400, img_800x600, img_1024x768', 'length', 'max'=>200),
			array('dob_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, artist_type, is_celebrity, is_primary, img_175x175, img_185x100, img_600x400, img_800x600, img_1024x768, dob_date, user_rating, user_rating_count, added_on', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'artist_type' => 'Artist Type',
			'is_celebrity' => 'Is Celebrity',
			'is_primary' => 'Is Primary',
			'img_175x175' => 'Img 175x175',
			'img_185x100' => 'Img 185x100',
			'img_600x400' => 'Img 600x400',
			'img_800x600' => 'Img 800x600',
			'img_1024x768' => 'Img 1024x768',
			'dob_date' => 'Dob Date',
			'user_rating' => 'User Rating',
			'user_rating_count' => 'User Rating Count',
			'added_on' => 'Added On',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('artist_type',$this->artist_type,true);
		$criteria->compare('is_celebrity',$this->is_celebrity);
		$criteria->compare('is_primary',$this->is_primary);
		$criteria->compare('img_175x175',$this->img_175x175,true);
		$criteria->compare('img_185x100',$this->img_185x100,true);
		$criteria->compare('img_600x400',$this->img_600x400,true);
		$criteria->compare('img_800x600',$this->img_800x600,true);
		$criteria->compare('img_1024x768',$this->img_1024x768,true);
		$criteria->compare('dob_date',$this->dob_date,true);
		$criteria->compare('user_rating',$this->user_rating);
		$criteria->compare('user_rating_count',$this->user_rating_count,true);
		$criteria->compare('added_on',$this->added_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}