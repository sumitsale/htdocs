<?php

/**
 * This is the model class for table "hotel".
 *
 * The followings are the available columns in table 'hotel':
 * @property integer $id
 * @property string $hotel_name
 * @property string $thumbnail
 * @property string $address
 * @property string $start_price
 * @property string $description
 * @property string $rating
 * @property string $date_added
 * @property string $date_modified
 */
class Hotel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hotel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hotel_name, city,address, start_price,price_with_offer, description, rating, show_on_site,date_added, date_modified', 'required'),
			array('hotel_name, thumbnail, start_price, description', 'length', 'max'=>500),
			
			array('address', 'length', 'max'=>1000),
			array('rating', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hotel_name, thumbnail, address, start_price, description, rating, date_added, date_modified', 'safe', 'on'=>'search'),
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
			'hotel_name' => 'Hotel Name',
			'thumbnail' => 'Thumbnail',
			'address' => 'Address',
			'start_price' => 'Start Price',
			'description' => 'Description',
			'rating' => 'Rating',
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
		$criteria->compare('hotel_name',$this->hotel_name,true);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('start_price',$this->start_price,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('rating',$this->rating,true);
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
	 * @return Hotel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}