<?php

/**
 * This is the model class for table "hotel_room".
 *
 * The followings are the available columns in table 'hotel_room':
 * @property integer $id
 * @property integer $hotel_detail_id
 * @property integer $room_type
 * @property integer $room_amunities
 * @property integer $thumbnail
 * @property integer $inclusion
 * @property integer $charges
 * @property integer $accomodation_charges
 */
class HotelRoom extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hotel_room';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hotel_detail_id, room_type,price_with_offer,room_amunities, thumbnail, inclusion, charges, accomodation_charges', 'required'),
			array('hotel_detail_id, room_type, room_amunities, thumbnail, inclusion, charges, accomodation_charges', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hotel_detail_id, room_type, room_amunities, thumbnail, inclusion, charges, accomodation_charges', 'safe', 'on'=>'search'),
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
			'hotel_detail_id' => 'Hotel Detail',
			'room_type' => 'Room Type',
			'room_amunities' => 'Room Amunities',
			'thumbnail' => 'Thumbnail',
			'inclusion' => 'Inclusion',
			'charges' => 'Charges',
			'accomodation_charges' => 'Accomodation Charges',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('hotel_detail_id',$this->hotel_detail_id);
		$criteria->compare('room_type',$this->room_type);
		$criteria->compare('room_amunities',$this->room_amunities);
		$criteria->compare('thumbnail',$this->thumbnail);
		$criteria->compare('inclusion',$this->inclusion);
		$criteria->compare('charges',$this->charges);
		$criteria->compare('accomodation_charges',$this->accomodation_charges);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HotelRoom the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
