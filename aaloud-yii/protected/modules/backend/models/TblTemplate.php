<?php

/**
 * This is the model class for table "tbl_template".
 *
 * The followings are the available columns in table 'tbl_template':
 * @property string $TEMPLATE_ID
 * @property string $TEMPLATE_MASTER_ID
 * @property string $STORE_FRONT_ID
 * @property string $TEMPLATE_NAME
 * @property double $CREATED_ON
 */
class TblTemplate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblTemplate the static model class
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
		return 'tbl_template';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TEMPLATE_NAME, TEMPLATE_MASTER_ID','required'),
			array('CREATED_ON', 'numerical'),
			array('TEMPLATE_MASTER_ID, STORE_FRONT_ID', 'length', 'max'=>9),
			array('TEMPLATE_NAME', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('TEMPLATE_ID, TEMPLATE_MASTER_ID, STORE_FRONT_ID, TEMPLATE_NAME, CREATED_ON', 'safe', 'on'=>'search'),
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
			'TEMPLATE_ID' => 'Template',
			'TEMPLATE_MASTER_ID' => 'Template Master',
			'STORE_FRONT_ID' => 'Store Front',
			'TEMPLATE_NAME' => 'Template Name',
			'CREATED_ON' => 'Created On',
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

		$criteria->compare('TEMPLATE_ID',$this->TEMPLATE_ID,true);
		$criteria->compare('TEMPLATE_MASTER_ID',$this->TEMPLATE_MASTER_ID,true);
		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);
		$criteria->compare('TEMPLATE_NAME',$this->TEMPLATE_NAME,true);
		$criteria->compare('CREATED_ON',$this->CREATED_ON);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}