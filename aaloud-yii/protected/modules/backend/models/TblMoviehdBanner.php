<?php

/**
 * This is the model class for table "tbl_moviehd_banner".
 *
 * The followings are the available columns in table 'tbl_moviehd_banner':
 * @property integer $priority_id
 * @property string $movie_id
 * @property string $store_front_id
 * @property string $image_path
 * @property string $url
 */
class TblMoviehdBanner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblMoviehdBanner the static model class
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
		return 'tbl_moviehd_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('priority_id', 'required'),
			array('priority_id', 'numerical', 'integerOnly'=>true),
			array('movie_id, store_front_id', 'length', 'max'=>10),
			array('image_path, url', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('priority_id, movie_id, store_front_id, image_path, url', 'safe', 'on'=>'search'),
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
			'priority_id' => 'Priority',
			'movie_id' => 'Movie',
			'store_front_id' => 'Store Front',
			'image_path' => 'Image Path',
			'url' => 'Url',
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

		$criteria->compare('priority_id',$this->priority_id);
		$criteria->compare('movie_id',$this->movie_id,true);
		$criteria->compare('store_front_id',$this->store_front_id,true);
		$criteria->compare('image_path',$this->image_path,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}