<?php

/**
 * This is the model class for table "TBL_TABS".
 *
 * The followings are the available columns in table 'TBL_TABS':
 * @property string $TAB_ID
 * @property string $MAIN_TAB_ID
 * @property string $TAB_NAME
 * @property string $STORE_FRONT_ID
 */
class TBLTABS extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TBLTABS the static model class
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
		return 'tbl_tabs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MAIN_TAB_ID, STORE_FRONT_ID', 'length', 'max'=>12),
			array('TAB_NAME', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('TAB_ID, MAIN_TAB_ID, TAB_NAME, STORE_FRONT_ID', 'safe', 'on'=>'search'),
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
			'TAB_ID' => 'Tab',
			'MAIN_TAB_ID' => 'Main Tab',
			'TAB_NAME' => 'Tab Name',
			'STORE_FRONT_ID' => 'Store Front',
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

		$criteria->compare('TAB_ID',$this->TAB_ID,true);
		$criteria->compare('MAIN_TAB_ID',$this->MAIN_TAB_ID,true);
		$criteria->compare('TAB_NAME',$this->TAB_NAME,true);
		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}