<?php

/**
 * This is the model class for table "tbl_operator_plan".
 *
 * The followings are the available columns in table 'tbl_operator_plan':
 * @property string $OPERATOR_PLAN_ID
 * @property string $STORE_PLAN_ID
 * @property string $OPERATOR_ID
 * @property string $SMS_FIRSTTIME
 * @property string $SMS_PRE_RENEWAL
 * @property string $SMS_CHARGING
 * @property string $SMS_UNSUBSCRIPTION
 * @property string $SMS_FAILED
 * @property double $INDATE
 * @property integer $STATUS
 * @property string $NO_OF_ATTEMPTS
 * @property string $GRACE_PERIOD
 */
class TblOperatorPlan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblOperatorPlan the static model class
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
		return 'tbl_operator_plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('STATUS', 'numerical', 'integerOnly'=>true),
			array('INDATE', 'numerical'),
			array('STORE_PLAN_ID, OPERATOR_ID, NO_OF_ATTEMPTS, GRACE_PERIOD', 'length', 'max'=>9),
			array('SMS_FIRSTTIME, SMS_PRE_RENEWAL, SMS_CHARGING, SMS_UNSUBSCRIPTION, SMS_FAILED', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('OPERATOR_PLAN_ID, STORE_PLAN_ID, OPERATOR_ID, SMS_FIRSTTIME, SMS_PRE_RENEWAL, SMS_CHARGING, SMS_UNSUBSCRIPTION, SMS_FAILED, INDATE, STATUS, NO_OF_ATTEMPTS, GRACE_PERIOD', 'safe', 'on'=>'search'),
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
			'OPERATOR_PLAN_ID' => 'Operator Plan',
			'STORE_PLAN_ID' => 'Store Plan',
			'OPERATOR_ID' => 'Operator',
			'SMS_FIRSTTIME' => 'Sms Firsttime',
			'SMS_PRE_RENEWAL' => 'Sms Pre Renewal',
			'SMS_CHARGING' => 'Sms Charging',
			'SMS_UNSUBSCRIPTION' => 'Sms Unsubscription',
			'SMS_FAILED' => 'Sms Failed',
			'INDATE' => 'Indate',
			'STATUS' => 'Status',
			'NO_OF_ATTEMPTS' => 'No Of Attempts',
			'GRACE_PERIOD' => 'Grace Period',
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

		$criteria->compare('OPERATOR_PLAN_ID',$this->OPERATOR_PLAN_ID,true);
		$criteria->compare('STORE_PLAN_ID',$this->STORE_PLAN_ID,true);
		$criteria->compare('OPERATOR_ID',$this->OPERATOR_ID,true);
		$criteria->compare('SMS_FIRSTTIME',$this->SMS_FIRSTTIME,true);
		$criteria->compare('SMS_PRE_RENEWAL',$this->SMS_PRE_RENEWAL,true);
		$criteria->compare('SMS_CHARGING',$this->SMS_CHARGING,true);
		$criteria->compare('SMS_UNSUBSCRIPTION',$this->SMS_UNSUBSCRIPTION,true);
		$criteria->compare('SMS_FAILED',$this->SMS_FAILED,true);
		$criteria->compare('INDATE',$this->INDATE);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('NO_OF_ATTEMPTS',$this->NO_OF_ATTEMPTS,true);
		$criteria->compare('GRACE_PERIOD',$this->GRACE_PERIOD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}