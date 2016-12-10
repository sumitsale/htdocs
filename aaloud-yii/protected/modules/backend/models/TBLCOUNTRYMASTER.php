<?php

/**
 * This is the model class for table "TBL_COUNTRY_MASTER".
 *
 * The followings are the available columns in table 'TBL_COUNTRY_MASTER':
 * @property string $COUNTRY_ID
 * @property string $COUNTRY_NAME
 * @property string $COUNTRY_CODE
 */
class TBLCOUNTRYMASTER extends CActiveRecord
{

		
		
		
	/**
	 * Returns the static model of the specified AR class.
	 * @return TBLCOUNTRYMASTER the static model class
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
		return 'tbl_country_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COUNTRY_ID', 'length', 'max'=>2),
			array('COUNTRY_CODE', 'length', 'max'=>9),
			array('COUNTRY_NAME', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('COUNTRY_ID, COUNTRY_NAME, COUNTRY_CODE', 'safe', 'on'=>'search'),
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
			'COUNTRY_ID' => 'Country',
			'COUNTRY_NAME' => 'Country Name',
			'COUNTRY_CODE' => 'Country Code',
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

		$criteria->compare('COUNTRY_ID',$this->COUNTRY_ID,true);
		$criteria->compare('COUNTRY_NAME',$this->COUNTRY_NAME,true);
		$criteria->compare('COUNTRY_CODE',$this->COUNTRY_CODE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}