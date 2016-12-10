<?php

/**
 * This is the model class for table "tbl_mood_details".
 *
 * The followings are the available columns in table 'tbl_mood_details':
 * @property integer $MOOD_ID
 * @property string $LANGUAGE_ID
 * @property string $MOOD_TITLE
 */
class TblMoodDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblMoodDetails the static model class
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
		return 'tbl_mood_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LANGUAGE_ID, MOOD_TITLE', 'required'),
			array('LANGUAGE_ID', 'length', 'max'=>50),
			array('MOOD_TITLE', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('MOOD_ID, LANGUAGE_ID, MOOD_TITLE', 'safe', 'on'=>'search'),
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
			'MOOD_ID' => 'Mood',
			'LANGUAGE_ID' => 'Language',
			'MOOD_TITLE' => 'Mood Title',
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

		$criteria->compare('MOOD_ID',$this->MOOD_ID);
		$criteria->compare('LANGUAGE_ID',$this->LANGUAGE_ID,true);
		$criteria->compare('MOOD_TITLE',$this->MOOD_TITLE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}