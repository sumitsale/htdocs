<?php

/**
 * This is the model class for table "tbl_filter_ip".
 *
 * The followings are the available columns in table 'tbl_filter_ip':
 * @property integer $id
 * @property string $ipfrom
 * @property string $ipto
 * @property string $COUNTRY_ID
 */
class TblFilterIp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblFilterIp the static model class
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
		return 'tbl_filter_ip';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ipfrom, ipto, COUNTRY_ID', 'required'),
			array('ipfrom, ipto', 'length', 'max'=>50),
			array('COUNTRY_ID', 'length', 'max'=>55),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ipfrom, ipto, COUNTRY_ID', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'ipfrom' => 'Ipfrom',
			'ipto' => 'Ipto',
			'COUNTRY_ID' => 'Country',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('ipfrom',$this->ipfrom,true);
		$criteria->compare('ipto',$this->ipto,true);
		$criteria->compare('COUNTRY_ID',$this->COUNTRY_ID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}