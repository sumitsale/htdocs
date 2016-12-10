<?php

/**
 * This is the model class for table "tbl_container_master".
 *
 * The followings are the available columns in table 'tbl_container_master':
 * @property string $CONTAINER_ID
 * @property string $CONTAINER_LOCATION
 * @property string $CONTAINER_NAME
 * @property string $STORE_FRONT_ID
 */
class TblContainerMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblContainerMaster the static model class
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
		return 'tbl_container_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CONTAINER_LOCATION, CONTAINER_NAME','required'),
			array('CONTAINER_LOCATION, CONTAINER_NAME', 'length', 'max'=>50),
			array('STORE_FRONT_ID', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CONTAINER_ID, CONTAINER_LOCATION, CONTAINER_NAME, STORE_FRONT_ID', 'safe', 'on'=>'search'),
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
			'CONTAINER_LOCATION' => 'Container Location',
			'CONTAINER_NAME' => 'Container Name',
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
		$criteria->compare('CONTAINER_LOCATION',$this->CONTAINER_LOCATION,true);
		$criteria->compare('CONTAINER_NAME',$this->CONTAINER_NAME,true);
		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}