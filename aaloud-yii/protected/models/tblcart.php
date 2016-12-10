<?php

/**
 * This is the model class for table "tbl_cart".
 *
 * The followings are the available columns in table 'tbl_cart':
 * @property string $CART_ID
 * @property string $USER_ID
 * @property string $CONTENT_ID
 * @property string $CONTENT_TYPE_ID
 * @property string $CONTENT_TITLE
 * @property string $COOKIE_ID
 * @property string $QUANTITY
 * @property string $STATUS
 * @property double $ADDED_ON
 * @property string $STORE_FRONT_ID
 */
class tblcart extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return tblcart the static model class
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
		return 'tbl_cart';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ADDED_ON', 'numerical'),
			array('USER_ID, CONTENT_ID, CONTENT_TYPE_ID, STORE_FRONT_ID', 'length', 'max'=>9),
			array('CONTENT_TITLE', 'length', 'max'=>250),
			array('COOKIE_ID', 'length', 'max'=>100),
			array('QUANTITY', 'length', 'max'=>5),
			array('STATUS', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CART_ID, USER_ID, CONTENT_ID, CONTENT_TYPE_ID, CONTENT_TITLE, COOKIE_ID, QUANTITY, STATUS, ADDED_ON, STORE_FRONT_ID', 'safe', 'on'=>'search'),
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
			'CART_ID' => 'Cart',
			'USER_ID' => 'User',
			'CONTENT_ID' => 'Content',
			'CONTENT_TYPE_ID' => 'Content Type',
			'CONTENT_TITLE' => 'Content Title',
			'COOKIE_ID' => 'Cookie',
			'QUANTITY' => 'Quantity',
			'STATUS' => 'Status',
			'ADDED_ON' => 'Added On',
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

		$criteria->compare('CART_ID',$this->CART_ID,true);
		$criteria->compare('USER_ID',$this->USER_ID,true);
		$criteria->compare('CONTENT_ID',$this->CONTENT_ID,true);
		$criteria->compare('CONTENT_TYPE_ID',$this->CONTENT_TYPE_ID,true);
		$criteria->compare('CONTENT_TITLE',$this->CONTENT_TITLE,true);
		$criteria->compare('COOKIE_ID',$this->COOKIE_ID,true);
		$criteria->compare('QUANTITY',$this->QUANTITY,true);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('ADDED_ON',$this->ADDED_ON);
		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}