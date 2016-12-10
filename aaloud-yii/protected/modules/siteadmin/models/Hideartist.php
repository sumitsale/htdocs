<?php

/**
 * This is the model class for table "hideartist".
 *
 * The followings are the available columns in table 'hideartist':
 * @property string $id
 * @property string $artistid
 * @property string $artistname
 */
class Hideartist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hideartist the static model class
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
		return 'hideartist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('artistid, artistname', 'required'),
			array('artistid', 'length', 'max'=>20),
			array('artistname', 'length', 'max'=>1000),
			array('artistid', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, artistid, artistname', 'safe', 'on'=>'search'),
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
			'artistid' => 'Artistid',
			'artistname' => 'Artistname',
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
		$criteria->compare('artistid',$this->artistid,true);
		$criteria->compare('artistname',$this->artistname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}