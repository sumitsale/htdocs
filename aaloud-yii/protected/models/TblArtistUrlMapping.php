<?php

/**
 * This is the model class for table "tbl_artist_url_mapping".
 *
 * The followings are the available columns in table 'tbl_artist_url_mapping':
 * @property integer $id
 * @property integer $artist_id
 * @property string $old_url
 * @property string $new_url
 */
class TblArtistUrlMapping extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblArtistUrlMapping the static model class
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
		return 'tbl_artist_url_mapping';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('artist_id, old_url, new_url', 'required'),
			array('artist_id', 'numerical', 'integerOnly'=>true),
			array('old_url, new_url', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, artist_id, old_url, new_url', 'safe', 'on'=>'search'),
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
			'old_url' => 'Old Url',
			'new_url' => 'New Url',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('artist_id',$this->artist_id);
		$criteria->compare('old_url',$this->old_url,true);
		$criteria->compare('new_url',$this->new_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}