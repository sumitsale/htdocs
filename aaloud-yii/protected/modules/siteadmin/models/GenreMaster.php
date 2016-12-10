<?php

/**
 * This is the model class for table "genre_master".
 *
 * The followings are the available columns in table 'genre_master':
 * @property integer $genre_id
 * @property string $genre_name
 * @property integer $priority
 * @property double $indate
 */
class GenreMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GenreMaster the static model class
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
		return 'genre_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('genre_name', 'required'),
			array('genre_name', 'unique'),
			array('priority', 'numerical', 'integerOnly'=>true),
			array('indate', 'numerical'),
			array('genre_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('genre_id, genre_name, priority, indate', 'safe', 'on'=>'search'),
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
			'genre_id' => 'Genre',
			'genre_name' => 'Genre Name',
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

		$criteria->compare('genre_id',$this->genre_id);
		$criteria->compare('genre_name',$this->genre_name,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('indate',$this->indate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}