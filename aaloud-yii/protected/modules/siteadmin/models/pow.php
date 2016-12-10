<?php

/**
 * This is the model class for table "tbl_aa_pow".
 *
 * The followings are the available columns in table 'tbl_aa_pow':
 * @property integer $POW_ID
 * @property string $CONTENT_ID
 * @property double $LAST_UPDATE
 */
class pow extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return pow the static model class
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
		return 'tbl_aa_pow';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LAST_UPDATE', 'numerical'),
			array('CONTENT_ID', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('POW_ID, CONTENT_ID, LAST_UPDATE', 'safe', 'on'=>'search'),
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
			'POW_ID' => 'Pow',
			'CONTENT_ID' => 'Content',
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

		$criteria->compare('POW_ID',$this->POW_ID);
		$criteria->compare('CONTENT_ID',$this->CONTENT_ID,true);
		$criteria->compare('LAST_UPDATE',$this->LAST_UPDATE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}