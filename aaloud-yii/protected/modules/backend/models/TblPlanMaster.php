<?php

/**
 * This is the model class for table "tbl_plan_master".
 *
 * The followings are the available columns in table 'tbl_plan_master':
 * @property string $PLAN_ID
 * @property string $PLAN_TITLE
 * @property string $PLAN_DESC
 * @property string $PLAN_FOR
 * @property string $PLAN_TYPE
 * @property string $PLAN_CATALOG
 * @property string $PLAN_DOWNLOAD
 * @property string $PLAN_PURCHASE
 * @property string $PLAN_PACKAGE_TYPE
 * @property string $PLAN_CONTENT_TYPE
 * @property string $ADDED_ON
 */
class TblPlanMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblPlanMaster the static model class
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
		return 'tbl_plan_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PLAN_DESC', 'required'),
			array('PLAN_TITLE', 'length', 'max'=>100),
			array('PLAN_FOR, PLAN_TYPE, PLAN_CATALOG, PLAN_DOWNLOAD, PLAN_PURCHASE, PLAN_PACKAGE_TYPE', 'length', 'max'=>1),
			array('PLAN_CONTENT_TYPE', 'length', 'max'=>10),
			array('ADDED_ON', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PLAN_ID, PLAN_TITLE, PLAN_DESC, PLAN_FOR, PLAN_TYPE, PLAN_CATALOG, PLAN_DOWNLOAD, PLAN_PURCHASE, PLAN_PACKAGE_TYPE, PLAN_CONTENT_TYPE, ADDED_ON', 'safe', 'on'=>'search'),
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
			'PLAN_ID' => 'Plan',
			'PLAN_TITLE' => 'Plan Title',
			'PLAN_DESC' => 'Plan Desc',
			'PLAN_FOR' => 'Plan For',
			'PLAN_TYPE' => 'Plan Type',
			'PLAN_CATALOG' => 'Plan Catalog',
			'PLAN_DOWNLOAD' => 'Plan Download',
			'PLAN_PURCHASE' => 'Plan Purchase',
			'PLAN_PACKAGE_TYPE' => 'Plan Package Type',
			'PLAN_CONTENT_TYPE' => 'Plan Content Type',
			'ADDED_ON' => 'Added On',
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

		$criteria->compare('PLAN_ID',$this->PLAN_ID,true);
		$criteria->compare('PLAN_TITLE',$this->PLAN_TITLE,true);
		$criteria->compare('PLAN_DESC',$this->PLAN_DESC,true);
		$criteria->compare('PLAN_FOR',$this->PLAN_FOR,true);
		$criteria->compare('PLAN_TYPE',$this->PLAN_TYPE,true);
		$criteria->compare('PLAN_CATALOG',$this->PLAN_CATALOG,true);
		$criteria->compare('PLAN_DOWNLOAD',$this->PLAN_DOWNLOAD,true);
		$criteria->compare('PLAN_PURCHASE',$this->PLAN_PURCHASE,true);
		$criteria->compare('PLAN_PACKAGE_TYPE',$this->PLAN_PACKAGE_TYPE,true);
		$criteria->compare('PLAN_CONTENT_TYPE',$this->PLAN_CONTENT_TYPE,true);
		$criteria->compare('ADDED_ON',$this->ADDED_ON,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}