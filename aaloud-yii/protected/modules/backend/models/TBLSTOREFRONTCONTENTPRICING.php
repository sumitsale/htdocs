<?php

/**
 * This is the model class for table "TBL_STORE_FRONT_CONTENT_PRICING".
 *
 * The followings are the available columns in table 'TBL_STORE_FRONT_CONTENT_PRICING':
 * @property string $STORE_FRONT_ID
 * @property string $CONTENT_TYPE_ID
 * @property double $RATE
 * @property double $TAXES
 * @property double $FINAL_RATE
 */
class TBLSTOREFRONTCONTENTPRICING extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TBLSTOREFRONTCONTENTPRICING the static model class
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
		return 'tbl_store_front_content_pricing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RATE, TAXES, FINAL_RATE', 'numerical'),
			array('STORE_FRONT_ID, CONTENT_TYPE_ID', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('STORE_FRONT_ID, CONTENT_TYPE_ID, RATE, TAXES, FINAL_RATE', 'safe', 'on'=>'search'),
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
			'STORE_FRONT_ID' => 'Store Front',
			'CONTENT_TYPE_ID' => 'Content Type',
			'RATE' => 'Rate',
			'TAXES' => 'Taxes',
			'FINAL_RATE' => 'Final Rate',
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

		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);
		$criteria->compare('CONTENT_TYPE_ID',$this->CONTENT_TYPE_ID,true);
		$criteria->compare('RATE',$this->RATE);
		$criteria->compare('TAXES',$this->TAXES);
		$criteria->compare('FINAL_RATE',$this->FINAL_RATE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}