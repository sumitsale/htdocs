<?php

/**
 * This is the model class for table "tbl_specials".
 *
 * The followings are the available columns in table 'tbl_specials':
 * @property string $special_id
 * @property string $special_name
 * @property string $special_link
 * @property string $special_image
 * @property double $indate
 */
class TblSpecials extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblSpecials the static model class
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
		return 'tbl_specials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('special_name, special_link', 'required'),
			array('indate', 'numerical'),
			array('special_name', 'length', 'max'=>200),
			array('special_link', 'length', 'max'=>1000),
			array('special_image', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('special_id, special_name, special_link, special_image, indate', 'safe', 'on'=>'search'),
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
			'special_id' => 'Special',
			'special_name' => 'Special Name',
			'special_link' => 'Special Link',
			'special_image' => 'Special Image',
			'indate' => 'Indate',
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

		$criteria->compare('special_id',$this->special_id,true);
		$criteria->compare('special_name',$this->special_name,true);
		$criteria->compare('special_link',$this->special_link,true);
		$criteria->compare('special_image',$this->special_image,true);
		$criteria->compare('indate',$this->indate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}