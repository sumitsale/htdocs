<?php

/**
 * This is the model class for table "tbl_wap_atm".
 *
 * The followings are the available columns in table 'tbl_wap_atm':
 * @property string $ATM_ID
 * @property string $ATM_TITLE
 * @property string $ATM_DESC
 * @property string $ATM_URL
 * @property integer $ATM_MONTH
 * @property integer $ATM_YEAR
 * @property double $ATM_INDATE
 */
class TblWapAtm extends CActiveRecord
{
	

	/**
	 * Returns the static model of the specified AR class.
	 * @return TblWapAtm the static model class
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
		return 'tbl_wap_atm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ATM_TITLE, ATM_DESC', 'required'),
			array('ATM_MONTH, ATM_YEAR', 'numerical', 'integerOnly'=>true),
			array('ATM_INDATE', 'numerical'),
			array('ATM_TITLE', 'length', 'max'=>100),
			array('ATM_DESC', 'length', 'max'=>250),
			array('ATM_URL', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ATM_ID, ATM_TITLE, ATM_DESC, ATM_URL, ATM_MONTH, ATM_YEAR, ATM_INDATE', 'safe', 'on'=>'search'),
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
			'ATM_ID' => 'Atm',
			'ATM_TITLE' => 'Title',
			'ATM_DESC' => 'Description',
			'ATM_URL' => 'Url',
			'ATM_MONTH' => 'Atm Month',
			'ATM_YEAR' => 'Atm Year',
			'ATM_INDATE' => 'Atm Indate',
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

		$criteria->compare('ATM_ID',$this->ATM_ID,true);
		$criteria->compare('ATM_TITLE',$this->ATM_TITLE,true);
		$criteria->compare('ATM_DESC',$this->ATM_DESC,true);
		$criteria->compare('ATM_URL',$this->ATM_URL,true);
		$criteria->compare('ATM_MONTH',$this->ATM_MONTH);
		$criteria->compare('ATM_YEAR',$this->ATM_YEAR);
		$criteria->compare('ATM_INDATE',$this->ATM_INDATE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}