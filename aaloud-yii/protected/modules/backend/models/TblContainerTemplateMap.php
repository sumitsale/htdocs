<?php

/**
 * This is the model class for table "tbl_container_template_map".
 *
 * The followings are the available columns in table 'tbl_container_template_map':
 * @property string $CONTAINER_ID
 * @property string $TEMPLATE_ID
 * @property string $STORE_FRONT_ID
 */
class TblContainerTemplateMap extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblContainerTemplateMap the static model class
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
		return 'tbl_container_template_map';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CONTAINER_ID, TEMPLATE_ID, STORE_FRONT_ID', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CONTAINER_ID, TEMPLATE_ID, STORE_FRONT_ID', 'safe', 'on'=>'search'),
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
			'CONTAINER_ID' => 'Container',
			'TEMPLATE_ID' => 'Template',
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

		$criteria->compare('CONTAINER_ID',$this->CONTAINER_ID,true);
		$criteria->compare('TEMPLATE_ID',$this->TEMPLATE_ID,true);
		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}