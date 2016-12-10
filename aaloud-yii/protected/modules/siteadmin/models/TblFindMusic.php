<?php

/**
 * This is the model class for table "tbl_find_music".
 *
 * The followings are the available columns in table 'tbl_find_music':
 * @property string $id
 * @property string $artist_id
 * @property string $artist_name
 * @property string $hungama_link
 * @property string $ovi_link
 * @property string $itune_link
 * @property string $sms_download_link
 */
class TblFindMusic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblFindMusic the static model class
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
		return 'tbl_find_music';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('artist_id, artist_name', 'required'),
			array('artist_id', 'length', 'max'=>20),
			array('artist_name, hungama_link, ovi_link, itune_link, sms_download_link', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, artist_id, artist_name, hungama_link, ovi_link, itune_link, sms_download_link', 'safe', 'on'=>'search'),
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
			'hungama_link' => 'Hungama Link',
			'ovi_link' => 'Ovi Link',
			'itune_link' => 'Itune Link',
			'sms_download_link' => 'Sms Download Link',
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
		$criteria->compare('hungama_link',$this->hungama_link,true);
		$criteria->compare('ovi_link',$this->ovi_link,true);
		$criteria->compare('itune_link',$this->itune_link,true);
		$criteria->compare('sms_download_link',$this->sms_download_link,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}