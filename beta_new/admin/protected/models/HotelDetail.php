<?php

/**
 * This is the model class for table "hotel_detail".
 *
 * The followings are the available columns in table 'hotel_detail':
 * @property integer $id
 * @property integer $hotel_id
 * @property string $overview_paragraph_1
 * @property string $overview_paragraph_2
 * @property string $overview_paragraph_3
 * @property string $room_1_type
 * @property string $room_1_amunities
 * @property string $room_1_thumbnail
 * @property string $room_1_inclusion
 * @property string $room_2_type
 * @property string $room_2_amunities
 * @property string $room_2_thumbnail
 * @property string $room_2_inclusion
 * @property string $room_3_type
 * @property string $room_3_amunities
 * @property string $room_3_thumbnail
 * @property string $room_3_inclusion
 * @property string $hotel_amunities
 * @property string $date_added
 * @property string $date_modified
 */
class HotelDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hotel_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hotel_id, meta_tag,room_1_accomodation_chargres,room_2_accomodation_chargres,room_3_accomodation_chargres,
					overview_paragraph_1, overview_paragraph_2, overview_paragraph_3, 
					
					hotel_amunities, room_amunitie,check_out_time,check_in_time,no_of_floor,no_of_room,notes_data ,date_added, 
					date_modified', 'required'),
			array('hotel_id', 'numerical', 'integerOnly'=>true),
			array('room_1_type, room_1_amunities, room_1_thumbnail, room_1_inclusion, room_2_type, room_2_amunities, room_2_thumbnail, room_2_inclusion, room_3_type, room_3_amunities, room_3_thumbnail, room_3_inclusion, hotel_amunities', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hotel_id, overview_paragraph_1, overview_paragraph_2, overview_paragraph_3, room_1_type, room_1_amunities, room_1_thumbnail, room_1_inclusion, room_2_type, room_2_amunities, room_2_thumbnail, room_2_inclusion, room_3_type, room_3_amunities, room_3_thumbnail, room_3_inclusion, hotel_amunities, date_added, date_modified', 'safe', 'on'=>'search'),
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
			'hotel_id' => 'Hotel',
			'overview_paragraph_1' => 'Overview Paragraph 1',
			'overview_paragraph_2' => 'Overview Paragraph 2',
			'overview_paragraph_3' => 'Overview Paragraph 3',
			'room_1_type' => 'Room 1 Type',
			'room_1_amunities' => 'Room 1 Amunities',
			'room_1_thumbnail' => 'Room 1 Thumbnail',
			'room_1_inclusion' => 'Room 1 Inclusion',
			'room_2_type' => 'Room 2 Type',
			'room_2_amunities' => 'Room 2 Amunities',
			'room_2_thumbnail' => 'Room 2 Thumbnail',
			'room_2_inclusion' => 'Room 2 Inclusion',
			'room_3_type' => 'Room 3 Type',
			'room_3_amunities' => 'Room 3 Amunities',
			'room_3_thumbnail' => 'Room 3 Thumbnail',
			'room_3_inclusion' => 'Room 3 Inclusion',
			'hotel_amunities' => 'Hotel Amunities',
			'date_added' => 'Date Added',
			'date_modified' => 'Date Modified',
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
		$criteria->compare('hotel_id',$this->hotel_id);
		$criteria->compare('overview_paragraph_1',$this->overview_paragraph_1,true);
		$criteria->compare('overview_paragraph_2',$this->overview_paragraph_2,true);
		$criteria->compare('overview_paragraph_3',$this->overview_paragraph_3,true);
		$criteria->compare('room_1_type',$this->room_1_type,true);
		$criteria->compare('room_1_amunities',$this->room_1_amunities,true);
		$criteria->compare('room_1_thumbnail',$this->room_1_thumbnail,true);
		$criteria->compare('room_1_inclusion',$this->room_1_inclusion,true);
		$criteria->compare('room_2_type',$this->room_2_type,true);
		$criteria->compare('room_2_amunities',$this->room_2_amunities,true);
		$criteria->compare('room_2_thumbnail',$this->room_2_thumbnail,true);
		$criteria->compare('room_2_inclusion',$this->room_2_inclusion,true);
		$criteria->compare('room_3_type',$this->room_3_type,true);
		$criteria->compare('room_3_amunities',$this->room_3_amunities,true);
		$criteria->compare('room_3_thumbnail',$this->room_3_thumbnail,true);
		$criteria->compare('room_3_inclusion',$this->room_3_inclusion,true);
		$criteria->compare('hotel_amunities',$this->hotel_amunities,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HotelDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
