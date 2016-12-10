<?php

/**
 * This is the model class for table "package_detail".
 *
 * The followings are the available columns in table 'package_detail':
 * @property integer $id
 * @property integer $package_id
 * @property string $thumbnail_1
 * @property string $thumbnail_2
 * @property string $thumbnail_3
 * @property string $thumbnail_4
 * @property string $thumbnail_5
 * @property string $activity
 * @property string $description
 * @property string $inclusion
 * @property string $itinerary_day_1_heading
 * @property string $itinerary_day_1_description
 * @property string $itinerary_day_2_heading
 * @property integer $itinerary_day_2_description
 * @property string $itinerary_day_3_heading
 * @property string $itinerary_day_3_description
 * @property string $itinerary_day_4_heading
 * @property string $itinerary_day_4_description
 * @property string $itinerary_day_5_heading
 * @property string $itinerary_day_5_description
 * @property string $itinerary_day_6_heading
 * @property string $itinerary_day_6_description
 * @property string $itinerary_day_7_heading
 * @property string $itinerary_day_7_description
 * @property string $hotel_id
 * @property string $hotel_name
 * @property string $date_added
 * @property string $date_modified
 */
class PackageDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'package_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	 
	 // itinerary_day_5_heading, itinerary_day_5_description,
			// itinerary_day_6_heading, itinerary_day_6_description,
			// itinerary_day_7_heading, itinerary_day_7_description,
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('package_id,meta_tag
			activity, description, inclusion, itinerary_day_1_heading, itinerary_day_1_description, itinerary_day_2_heading,
			itinerary_day_2_description, itinerary_day_3_heading, itinerary_day_3_description, 
			itinerary_day_4_heading, itinerary_day_4_description,hotel_id, hotel_name, date_added, date_modified', 'required'),
			array('package_id', 'numerical', 'integerOnly'=>true),
			array('thumbnail_1, thumbnail_2, thumbnail_3, thumbnail_4, thumbnail_5, itinerary_day_1_heading, itinerary_day_2_heading, itinerary_day_3_heading, itinerary_day_4_heading, itinerary_day_5_heading, itinerary_day_6_heading, itinerary_day_7_heading, hotel_id', 'length', 'max'=>500),
			// array('thumbnail_1', 'file','types'=>'jpg, gif, png'),
			// array('thumbnail_2', 'file','types'=>'jpg, gif, png'),
			// array('thumbnail_3', 'file','types'=>'jpg, gif, png'),
			// array('thumbnail_4', 'file','types'=>'jpg, gif, png'),
			// array('thumbnail_5', 'file','types'=>'jpg, gif, png'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, package_id, thumbnail_1, thumbnail_2, thumbnail_3, thumbnail_4, thumbnail_5, activity, description, inclusion, itinerary_day_1_heading, itinerary_day_1_description, itinerary_day_2_heading, itinerary_day_2_description, itinerary_day_3_heading, itinerary_day_3_description, itinerary_day_4_heading, itinerary_day_4_description, itinerary_day_5_heading, itinerary_day_5_description, itinerary_day_6_heading, itinerary_day_6_description, itinerary_day_7_heading, itinerary_day_7_description, hotel_id, hotel_name, date_added, date_modified', 'safe', 'on'=>'search'),
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
			'package_id' => 'Package',
			'thumbnail_1' => 'Thumbnail 1',
			'thumbnail_2' => 'Thumbnail 2',
			'thumbnail_3' => 'Thumbnail 3',
			'thumbnail_4' => 'Thumbnail 4',
			'thumbnail_5' => 'Thumbnail 5',
			'activity' => 'Activity',
			'description' => 'Description',
			'inclusion' => 'Inclusion',
			'itinerary_day_1_heading' => 'Itinerary Day 1 Heading',
			'itinerary_day_1_description' => 'Itinerary Day 1 Description',
			'itinerary_day_2_heading' => 'Itinerary Day 2 Heading',
			'itinerary_day_2_description' => 'Itinerary Day 2 Description',
			'itinerary_day_3_heading' => 'Itinerary Day 3 Heading',
			'itinerary_day_3_description' => 'Itinerary Day 3 Description',
			'itinerary_day_4_heading' => 'Itinerary Day 4 Heading',
			'itinerary_day_4_description' => 'Itinerary Day 4 Description',
			'itinerary_day_5_heading' => 'Itinerary Day 5 Heading',
			'itinerary_day_5_description' => 'Itinerary Day 5 Description',
			'itinerary_day_6_heading' => 'Itinerary Day 6 Heading',
			'itinerary_day_6_description' => 'Itinerary Day 6 Description',
			'itinerary_day_7_heading' => 'Itinerary Day 7 Heading',
			'itinerary_day_7_description' => 'Itinerary Day 7 Description',
			'hotel_id' => 'Hotel',
			'hotel_name' => 'Hotel Name',
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
		$criteria->compare('package_id',$this->package_id);
		$criteria->compare('thumbnail_1',$this->thumbnail_1,true);
		$criteria->compare('thumbnail_2',$this->thumbnail_2,true);
		$criteria->compare('thumbnail_3',$this->thumbnail_3,true);
		$criteria->compare('thumbnail_4',$this->thumbnail_4,true);
		$criteria->compare('thumbnail_5',$this->thumbnail_5,true);
		$criteria->compare('activity',$this->activity,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('inclusion',$this->inclusion,true);
		$criteria->compare('itinerary_day_1_heading',$this->itinerary_day_1_heading,true);
		$criteria->compare('itinerary_day_1_description',$this->itinerary_day_1_description,true);
		$criteria->compare('itinerary_day_2_heading',$this->itinerary_day_2_heading,true);
		$criteria->compare('itinerary_day_2_description',$this->itinerary_day_2_description);
		$criteria->compare('itinerary_day_3_heading',$this->itinerary_day_3_heading,true);
		$criteria->compare('itinerary_day_3_description',$this->itinerary_day_3_description,true);
		$criteria->compare('itinerary_day_4_heading',$this->itinerary_day_4_heading,true);
		$criteria->compare('itinerary_day_4_description',$this->itinerary_day_4_description,true);
		$criteria->compare('itinerary_day_5_heading',$this->itinerary_day_5_heading,true);
		$criteria->compare('itinerary_day_5_description',$this->itinerary_day_5_description,true);
		$criteria->compare('itinerary_day_6_heading',$this->itinerary_day_6_heading,true);
		$criteria->compare('itinerary_day_6_description',$this->itinerary_day_6_description,true);
		$criteria->compare('itinerary_day_7_heading',$this->itinerary_day_7_heading,true);
		$criteria->compare('itinerary_day_7_description',$this->itinerary_day_7_description,true);
		$criteria->compare('hotel_id',$this->hotel_id,true);
		$criteria->compare('hotel_name',$this->hotel_name,true);
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
	 * @return PackageDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
