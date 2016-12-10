<?php

/**
 * This is the model class for table "tbl_aa_wap_banner_storefront".
 *
 * The followings are the available columns in table 'tbl_aa_wap_banner_storefront':
 * @property string $LOCATION_ID
 * @property string $BANNER_TEXT
 * @property string $BANNER_REDIRECT_URL
 * @property integer $TYPE
 * @property string $BANNER_WIDTH
 * @property string $BANNER_HEIGHT
 * @property integer $BANNER_STATUS
 */
class TblAaWapBannerStorefront extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblAaWapBannerStorefront the static model class
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
		return 'tbl_aa_wap_banner_storefront';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LOCATION_ID, BANNER_TEXT, BANNER_REDIRECT_URL, TYPE, BANNER_WIDTH, BANNER_HEIGHT, BANNER_STATUS', 'required'),
			array('TYPE, BANNER_STATUS', 'numerical', 'integerOnly'=>true),
			array('LOCATION_ID', 'length', 'max'=>20),
			array('BANNER_WIDTH, BANNER_HEIGHT', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('LOCATION_ID, BANNER_TEXT, BANNER_REDIRECT_URL, TYPE, BANNER_WIDTH, BANNER_HEIGHT, BANNER_STATUS', 'safe', 'on'=>'search'),
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
			'LOCATION_ID' => 'Location',
			'BANNER_TEXT' => 'Banner Text',
			'BANNER_REDIRECT_URL' => 'Banner Redirect Url',
			'TYPE' => 'Type',
			'BANNER_WIDTH' => 'Banner Width',
			'BANNER_HEIGHT' => 'Banner Height',
			'BANNER_STATUS' => 'Banner Status',
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

		$criteria->compare('LOCATION_ID',$this->LOCATION_ID,true);
		$criteria->compare('BANNER_TEXT',$this->BANNER_TEXT,true);
		$criteria->compare('BANNER_REDIRECT_URL',$this->BANNER_REDIRECT_URL,true);
		$criteria->compare('TYPE',$this->TYPE);
		$criteria->compare('BANNER_WIDTH',$this->BANNER_WIDTH,true);
		$criteria->compare('BANNER_HEIGHT',$this->BANNER_HEIGHT,true);
		$criteria->compare('BANNER_STATUS',$this->BANNER_STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}