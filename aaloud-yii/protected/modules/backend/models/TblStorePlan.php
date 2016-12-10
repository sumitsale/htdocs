<?php

/**
 * This is the model class for table "tbl_store_plan".
 *
 * The followings are the available columns in table 'tbl_store_plan':
 * @property string $STORE_PLAN_ID
 * @property string $PLAN_ID
 * @property string $STORE_FRONT_ID
 * @property string $CONTENT_QTY
 * @property double $PLAN_PRICE
 * @property string $START_DATE
 * @property string $END_DATE
 * @property string $CONTENT_VALIDITY
 * @property string $VALID_FOR
 * @property string $STORE_PLAN_TITLE
 * @property string $STORE_PLAN_DESC
 * @property integer $STATUS
 * @property string $SMS_FIRSTTIME
 * @property string $SMS_PRE_RENEWAL
 * @property string $SMS_CHARGING
 * @property string $SMS_UNSUBSCRIPTION
 * @property string $SMS_FAILED
 * @property string $STEP_MASTER_PLAN_ID
 * @property string $AFFILIATE_ID
 * @property double $EUP
 * @property string $NO_OF_ATTEMPTS
 * @property string $GRACE_PERIOD
 * @property string $OPERATORS
 * @property string $STREAMING
 */
class TblStorePlan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblStorePlan the static model class
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
		return 'tbl_store_plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		    array('PLAN_ID,CONTENT_QTY,PLAN_PRICE,CONTENT_VALIDITY,VALID_FOR,START_DATE,END_DATE,STORE_PLAN_TITLE','required'),
			array('STATUS', 'numerical', 'integerOnly'=>true),
			array('PLAN_PRICE, EUP', 'numerical'),
			array('PLAN_ID, STORE_FRONT_ID, CONTENT_QTY, STEP_MASTER_PLAN_ID, AFFILIATE_ID, NO_OF_ATTEMPTS, GRACE_PERIOD, OPERATORS', 'length', 'max'=>9),
			array('CONTENT_VALIDITY', 'length', 'max'=>5),
			array('VALID_FOR', 'length', 'max'=>7),
			array('STORE_PLAN_TITLE', 'length', 'max'=>100),
			array('SMS_FIRSTTIME, SMS_PRE_RENEWAL, SMS_CHARGING, SMS_UNSUBSCRIPTION, SMS_FAILED', 'length', 'max'=>250),
			array('STREAMING', 'length', 'max'=>10),
			array('START_DATE, END_DATE, STORE_PLAN_DESC', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('STORE_PLAN_ID, PLAN_ID, STORE_FRONT_ID, CONTENT_QTY, PLAN_PRICE, START_DATE, END_DATE, CONTENT_VALIDITY, VALID_FOR, STORE_PLAN_TITLE, STORE_PLAN_DESC, STATUS, SMS_FIRSTTIME, SMS_PRE_RENEWAL, SMS_CHARGING, SMS_UNSUBSCRIPTION, SMS_FAILED, STEP_MASTER_PLAN_ID, AFFILIATE_ID, EUP, NO_OF_ATTEMPTS, GRACE_PERIOD, OPERATORS, STREAMING', 'safe', 'on'=>'search'),
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
			'STORE_PLAN_ID' => 'Store Plan',
			'PLAN_ID' => 'Plan',
			'STORE_FRONT_ID' => 'Store Front',
			'CONTENT_QTY' => 'Content Qty',
			'PLAN_PRICE' => 'Plan Price',
			'START_DATE' => 'Start Date',
			'END_DATE' => 'End Date',
			'CONTENT_VALIDITY' => 'Content Validity',
			'VALID_FOR' => 'Valid For',
			'STORE_PLAN_TITLE' => 'Store Plan Title',
			'STORE_PLAN_DESC' => 'Store Plan Desc',
			'STATUS' => 'Status',
			'SMS_FIRSTTIME' => 'Sms Firsttime',
			'SMS_PRE_RENEWAL' => 'Sms Pre Renewal',
			'SMS_CHARGING' => 'Sms Charging',
			'SMS_UNSUBSCRIPTION' => 'Sms Unsubscription',
			'SMS_FAILED' => 'Sms Failed',
			'STEP_MASTER_PLAN_ID' => 'Step Master Plan',
			'AFFILIATE_ID' => 'Affiliate',
			'EUP' => 'Eup',
			'NO_OF_ATTEMPTS' => 'No Of Attempts',
			'GRACE_PERIOD' => 'Grace Period',
			'OPERATORS' => 'Operators',
			'STREAMING' => 'Streaming',
			'plan' => 'Plan',
			'operators' => 'Operators',
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

		$criteria->compare('STORE_PLAN_ID',$this->STORE_PLAN_ID,true);
		$criteria->compare('PLAN_ID',$this->PLAN_ID,true);
		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);
		$criteria->compare('CONTENT_QTY',$this->CONTENT_QTY,true);
		$criteria->compare('PLAN_PRICE',$this->PLAN_PRICE);
		$criteria->compare('START_DATE',$this->START_DATE,true);
		$criteria->compare('END_DATE',$this->END_DATE,true);
		$criteria->compare('CONTENT_VALIDITY',$this->CONTENT_VALIDITY,true);
		$criteria->compare('VALID_FOR',$this->VALID_FOR,true);
		$criteria->compare('STORE_PLAN_TITLE',$this->STORE_PLAN_TITLE,true);
		$criteria->compare('STORE_PLAN_DESC',$this->STORE_PLAN_DESC,true);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('SMS_FIRSTTIME',$this->SMS_FIRSTTIME,true);
		$criteria->compare('SMS_PRE_RENEWAL',$this->SMS_PRE_RENEWAL,true);
		$criteria->compare('SMS_CHARGING',$this->SMS_CHARGING,true);
		$criteria->compare('SMS_UNSUBSCRIPTION',$this->SMS_UNSUBSCRIPTION,true);
		$criteria->compare('SMS_FAILED',$this->SMS_FAILED,true);
		$criteria->compare('STEP_MASTER_PLAN_ID',$this->STEP_MASTER_PLAN_ID,true);
		$criteria->compare('AFFILIATE_ID',$this->AFFILIATE_ID,true);
		$criteria->compare('EUP',$this->EUP);
		$criteria->compare('NO_OF_ATTEMPTS',$this->NO_OF_ATTEMPTS,true);
		$criteria->compare('GRACE_PERIOD',$this->GRACE_PERIOD,true);
		$criteria->compare('OPERATORS',$this->OPERATORS,true);
		$criteria->compare('STREAMING',$this->STREAMING,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}