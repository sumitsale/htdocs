<?php

/**
 * This is the model class for table "tbl_banner_storefront".
 *
 * The followings are the available columns in table 'tbl_banner_storefront':
 * @property string $BANNER_ID
 * @property string $STORE_FRONT_ID
 * @property string $LOCATION_ID
 * @property string $BANNER_TEXT
 * @property string $BANNER_REDIRECT_URL
 * @property integer $BANNER_STATUS
 * @property double $UPDATED_ON
 */
class TblBannerStorefront extends CActiveRecord
{
public $doc;
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblBannerStorefront the static model class
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
		return 'tbl_banner_storefront';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('STORE_FRONT_ID,LOCATION_ID,BANNER_TEXT, BANNER_REDIRECT_URL,BANNER_STATUS', 'required'),
			array('BANNER_STATUS', 'numerical', 'integerOnly'=>true),
			array('UPDATED_ON', 'numerical'),
			array('BANNER_REDIRECT_URL','url'),
			array('UPDATED_ON','default',
            'value'=>new CDbExpression('NOW()'),
            'setOnEmpty'=>false,'on'=>'insert'),
			array('STORE_FRONT_ID, LOCATION_ID', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('BANNER_ID, STORE_FRONT_ID, LOCATION_ID, BANNER_TEXT, BANNER_REDIRECT_URL, BANNER_STATUS, UPDATED_ON', 'safe', 'on'=>'search'),
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
			'BANNER_ID' => 'Banner',
			'STORE_FRONT_ID' => 'Store Front',
			'LOCATION_ID' => 'Location',
			'BANNER_TEXT' => 'Banner Text',
			'BANNER_REDIRECT_URL' => 'Banner Redirect Url',
			'BANNER_STATUS' => 'Banner Status',
			'UPDATED_ON' => 'Updated On',
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

		$criteria->compare('BANNER_ID',$this->BANNER_ID,true);
		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);
		$criteria->compare('LOCATION_ID',$this->LOCATION_ID,true);
		$criteria->compare('BANNER_TEXT',$this->BANNER_TEXT,true);
		$criteria->compare('BANNER_REDIRECT_URL',$this->BANNER_REDIRECT_URL,true);
		$criteria->compare('BANNER_STATUS',$this->BANNER_STATUS);
		$criteria->compare('UPDATED_ON',$this->UPDATED_ON);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}