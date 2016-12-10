<?php

/**
 * This is the model class for table "packages".
 *
 * The followings are the available columns in table 'packages':
 * @property integer $id
 * @property string $package_name
 * @property integer $category_id
 * @property string $category_name
 * @property string $package_day
 * @property string $package_night
 * @property string $pricing
 * @property string $destination
 * @property string $key_feature
 * @property string $package_thumbnail
 * @property string $show_on_site
 * @property string $date_added
 * @property string $date_modified
 */
class Packages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'packages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('package_name, category_id, rating,pricing_with_out_offer,
					small_description,category_name, package_day, 
					package_night, pricing, destination, 
					key_feature, show_on_site,status, date_added, date_modified', 'required'),
			array('category_id', 'numerical', 'integerOnly'=>true),
			array('package_name, category_name, destination, key_feature, package_thumbnail', 'length', 'max'=>500),
			array('package_day, package_night, show_on_site', 'length', 'max'=>100),
			array('pricing', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, package_name, category_id, category_name, package_day, package_night, pricing, destination, key_feature, package_thumbnail, show_on_site, date_added, date_modified', 'safe', 'on'=>'search'),
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
			'package_name' => 'Package Name',
			'category_id' => 'Category',
			'category_name' => 'Category Name',
			'package_day' => 'Package Day',
			'package_night' => 'Package Night',
			'pricing' => 'Pricing',
			'destination' => 'Destination',
			'key_feature' => 'Key Feature',
			'package_thumbnail' => 'Package Thumbnail',
			'show_on_site' => 'Show On Site',
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
		$criteria->compare('package_name',$this->package_name,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('category_name',$this->category_name,true);
		$criteria->compare('package_day',$this->package_day,true);
		$criteria->compare('package_night',$this->package_night,true);
		$criteria->compare('pricing',$this->pricing,true);
		$criteria->compare('destination',$this->destination,true);
		$criteria->compare('key_feature',$this->key_feature,true);
		$criteria->compare('package_thumbnail',$this->package_thumbnail,true);
		$criteria->compare('show_on_site',$this->show_on_site,true);
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
	 * @return Packages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
