<?php

/**
 * This is the model class for table "tbl_user_reviews".
 *
 * The followings are the available columns in table 'tbl_user_reviews':
 * @property string $REVIEW_ID
 * @property string $CONTENT_ID
 * @property string $CONTENT_TYPE_ID
 * @property string $STORE_FRONT_ID
 * @property string $USER_ID
 * @property string $FULL_NAME
 * @property string $EMAIL
 * @property string $USER_IP
 * @property string $USER_TYPE
 * @property string $REVIEW_TITLE
 * @property string $REVIEW_TEXT
 * @property string $REVIEW_ADDEDON
 * @property string $STATUS
 * @property integer $MARK_AS_SAFE
 * @property integer $ABUSE
 */
class TblUserReviews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblUserReviews the static model class
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
		return 'tbl_user_reviews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MARK_AS_SAFE, ABUSE', 'numerical', 'integerOnly'=>true),
			array('CONTENT_ID, CONTENT_TYPE_ID', 'length', 'max'=>9),
			array('STORE_FRONT_ID', 'length', 'max'=>20),
			array('USER_ID', 'length', 'max'=>12),
			array('FULL_NAME, EMAIL', 'length', 'max'=>100),
			array('USER_IP, USER_TYPE', 'length', 'max'=>50),
			array('REVIEW_TITLE', 'length', 'max'=>150),
			array('STATUS', 'length', 'max'=>2),
			array('REVIEW_TEXT, REVIEW_ADDEDON', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('REVIEW_ID, CONTENT_ID, CONTENT_TYPE_ID, STORE_FRONT_ID, USER_ID, FULL_NAME, EMAIL, USER_IP, USER_TYPE, REVIEW_TITLE, REVIEW_TEXT, REVIEW_ADDEDON, STATUS, MARK_AS_SAFE, ABUSE', 'safe', 'on'=>'search'),
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
			'REVIEW_ID' => 'Review',
			'CONTENT_ID' => 'Content ID',
			'CONTENT_TYPE_ID' => 'Content Type',
			'STORE_FRONT_ID' => 'Store Front',
			'USER_ID' => 'User ID',
			'FULL_NAME' => 'Full Name',
			'EMAIL' => 'Email',
			'USER_IP' => 'User Ip',
			'USER_TYPE' => 'User Type',
			'REVIEW_TITLE' => 'Review Title',
			'REVIEW_TEXT' => 'Review Text',
			'REVIEW_ADDEDON' => 'Review Addedon',
			'STATUS' => 'Status',
			'MARK_AS_SAFE' => 'Mark As Safe',
			'ABUSE' => 'Abuse',
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

		$criteria->compare('REVIEW_ID',$this->REVIEW_ID,true);
		$criteria->compare('CONTENT_ID',$this->CONTENT_ID,true);
		$criteria->compare('CONTENT_TYPE_ID',$this->CONTENT_TYPE_ID,true);
		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('FULL_NAME',$this->FULL_NAME,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('USER_IP',$this->USER_IP,true);
		$criteria->compare('USER_TYPE',$this->USER_TYPE,true);
		$criteria->compare('REVIEW_TITLE',$this->REVIEW_TITLE,true);
		$criteria->compare('REVIEW_TEXT',$this->REVIEW_TEXT,true);
		$criteria->compare('REVIEW_ADDEDON',$this->REVIEW_ADDEDON,true);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('MARK_AS_SAFE',$this->MARK_AS_SAFE);
		$criteria->compare('ABUSE',$this->ABUSE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}