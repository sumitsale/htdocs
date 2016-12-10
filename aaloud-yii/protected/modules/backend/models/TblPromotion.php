<?php

/**
 * This is the model class for table "tbl_promotion".
 *
 * The followings are the available columns in table 'tbl_promotion':
 * @property string $PROMO_ID
 * @property string $PROMO_TITLE
 * @property string $PLAN_ID
 * @property string $STORE_FRONT_ID
 * @property string $PROMO_STATUS
 * @property string $PROMO_CREATED
 * @property string $PROMO_MODIFIED
 */
class TblPromotion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblPromotion the static model class
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
		return 'tbl_promotion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PROMO_TITLE, PLAN_ID','required'),
			array('PROMO_TITLE', 'length', 'max'=>255),
			array('PLAN_ID, STORE_FRONT_ID, PROMO_STATUS', 'length', 'max'=>9),
			array('PROMO_CREATED, PROMO_MODIFIED', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PROMO_ID, PROMO_TITLE, PLAN_ID, STORE_FRONT_ID, PROMO_STATUS, PROMO_CREATED, PROMO_MODIFIED', 'safe', 'on'=>'search'),
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
			'PROMO_ID' => 'Promo',
			'PROMO_TITLE' => 'Promo Title',
			'PLAN_ID' => 'Plan',
			'STORE_FRONT_ID' => 'Store Front',
			'PROMO_STATUS' => 'Promo Status',
			'PROMO_CREATED' => 'Promo Created',
			'PROMO_MODIFIED' => 'Promo Modified',
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

		$criteria->compare('PROMO_ID',$this->PROMO_ID,true);
		$criteria->compare('PROMO_TITLE',$this->PROMO_TITLE,true);
		$criteria->compare('PLAN_ID',$this->PLAN_ID,true);
		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);
		$criteria->compare('PROMO_STATUS',$this->PROMO_STATUS,true);
		$criteria->compare('PROMO_CREATED',$this->PROMO_CREATED,true);
		$criteria->compare('PROMO_MODIFIED',$this->PROMO_MODIFIED,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}