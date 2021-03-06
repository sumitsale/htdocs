<?php

/**
 * This is the model class for table "TBL_QUESTIONS".
 *
 * The followings are the available columns in table 'TBL_QUESTIONS':
 * @property string $QUESTION_ID
 * @property string $QUESTION
 * @property string $STORE_FRONT_ID
 * @property string $MAIN_TAB_ID
 * @property string $TAB_ID
 * @property integer $STATUS
 */
class TBLQUESTIONS extends CActiveRecord
{
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return TBLQUESTIONS the static model class
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
		return 'tbl_questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('STATUS', 'numerical', 'integerOnly'=>true),
			array('STORE_FRONT_ID, MAIN_TAB_ID, TAB_ID', 'length', 'max'=>12),
			
			array('QUESTION', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('QUESTION_ID, QUESTION, STORE_FRONT_ID, MAIN_TAB_ID, TAB_ID, STATUS', 'safe', 'on'=>'search'),
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
			'QUESTION_ID' => 'Question',
			'QUESTION' => 'Question',
			'STORE_FRONT_ID' => 'Store Front',
			'MAIN_TAB_ID' => 'Main Tab',
			'TAB_ID' => 'Tab',
			'STATUS' => 'Status',
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

		$criteria->compare('QUESTION_ID',$this->QUESTION_ID,true);
		$criteria->compare('QUESTION',$this->QUESTION,true);
		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);
		$criteria->compare('MAIN_TAB_ID',$this->MAIN_TAB_ID,true);
		$criteria->compare('TAB_ID',$this->TAB_ID,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}