<?php

/**
 * This is the model class for table "tbl_aa_featured".
 *
 * The followings are the available columns in table 'tbl_aa_featured':
 * @property integer $F_ID
 * @property integer $CONTENT_TYPE_ID
 * @property string $ARTIST_ID
 * @property double $LAST_UPDATE
 */
class feature extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return feature the static model class
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
		return 'tbl_aa_featured';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CONTENT_TYPE_ID', 'numerical', 'integerOnly'=>true),
			array('LAST_UPDATE', 'numerical'),
			array('ARTIST_ID', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('F_ID, CONTENT_TYPE_ID, ARTIST_ID, LAST_UPDATE', 'safe', 'on'=>'search'),
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
			'F_ID' => 'F',
			'CONTENT_TYPE_ID' => 'Content Type',
			'ARTIST_ID' => 'Artist',
			'LAST_UPDATE' => 'Last Update',
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

		$criteria->compare('F_ID',$this->F_ID);
		$criteria->compare('CONTENT_TYPE_ID',$this->CONTENT_TYPE_ID);
		$criteria->compare('ARTIST_ID',$this->ARTIST_ID,true);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}