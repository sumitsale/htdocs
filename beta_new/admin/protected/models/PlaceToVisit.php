<?php

/**
 * This is the model class for table "place_to_visit".
 *
 * The followings are the available columns in table 'place_to_visit':
 * @property integer $id
 * @property string $place_name
 * @property string $category_name
 * @property string $small_thumbnail
 * @property string $thumbnail_1
 * @property string $thumbnail_2
 * @property string $thumbnail_3
 * @property string $thumbnail_4
 * @property string $thumbnail_5
 * @property string $description
 * @property string $date_added
 * @property string $date_modified
 */
class PlaceToVisit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'place_to_visit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('place_name, meta_tag,category_name, description, date_added, date_modified', 'required'),
			array('place_name, category_name, small_thumbnail, thumbnail_1, thumbnail_2, thumbnail_3, thumbnail_4, thumbnail_5', 'length', 'max'=>500),
			// array('thumbnail_1', 'file','types'=>'jpg, gif, png'),
			// array('thumbnail_2', 'file','types'=>'jpg, gif, png'),
			// array('thumbnail_3', 'file','types'=>'jpg, gif, png'),
			// array('thumbnail_4', 'file','types'=>'jpg, gif, png'),
			// array('thumbnail_5', 'file','types'=>'jpg, gif, png'),
			// array('small_thumbnail', 'file','types'=>'jpg, gif, png'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, place_name, category_name, small_thumbnail, thumbnail_1, thumbnail_2, thumbnail_3, thumbnail_4, thumbnail_5, description, date_added, date_modified', 'safe', 'on'=>'search'),
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
			'place_name' => 'Place Name',
			'category_name' => 'Category Name',
			'small_thumbnail' => 'Small Thumbnail',
			'thumbnail_1' => 'Thumbnail 1',
			'thumbnail_2' => 'Thumbnail 2',
			'thumbnail_3' => 'Thumbnail 3',
			'thumbnail_4' => 'Thumbnail 4',
			'thumbnail_5' => 'Thumbnail 5',
			'description' => 'Description',
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
		$criteria->compare('place_name',$this->place_name,true);
		$criteria->compare('category_name',$this->category_name,true);
		$criteria->compare('small_thumbnail',$this->small_thumbnail,true);
		$criteria->compare('thumbnail_1',$this->thumbnail_1,true);
		$criteria->compare('thumbnail_2',$this->thumbnail_2,true);
		$criteria->compare('thumbnail_3',$this->thumbnail_3,true);
		$criteria->compare('thumbnail_4',$this->thumbnail_4,true);
		$criteria->compare('thumbnail_5',$this->thumbnail_5,true);
		$criteria->compare('description',$this->description,true);
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
	 * @return PlaceToVisit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
