<?php

/**
 * This is the model class for table "topartists".
 *
 * The followings are the available columns in table 'topartists':
 * @property string $artist_name
 * @property integer $artist_id
 * @property integer $priority
 * @property double $indate
 */
class Topartists extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Topartists the static model class
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
		return 'topartists';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('artist_name, artist_id, priority, indate', 'required'),
			array('artist_id, priority', 'numerical', 'integerOnly'=>true),
			array('indate', 'numerical'),
			array('artist_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('artist_name, artist_id, priority, indate', 'safe', 'on'=>'search'),
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
			'artist_name' => 'Artist Name',
			'artist_id' => 'Artist',
			'priority' => 'Priority',
			'indate' => 'Indate',
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

		$criteria->compare('artist_name',$this->artist_name,true);
		$criteria->compare('artist_id',$this->artist_id);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('indate',$this->indate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}