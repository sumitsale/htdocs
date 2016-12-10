<?php

/**
 * This is the model class for table "product_brand".
 *
 * The followings are the available columns in table 'product_brand':
 * @property integer $id
 * @property string $product_name
 * @property integer $master_category_id
 * @property string $master_category_name
 * @property integer $master_brand_id
 * @property string $master_brand_name
 * @property string $thumbnail
 * @property string $thumbnail_big
 * @property string $rating
 * @property string $available
 * @property string $date_added
 * @property string $date_modified
 */
class ProductBrand extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_brand';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_name, master_category_id, master_category_name, master_brand_id, master_brand_name, thumbnail, thumbnail_big, rating, available, date_added, date_modified', 'required'),
			array('master_category_id, master_brand_id', 'numerical', 'integerOnly'=>true),
			array('product_name, master_category_name, master_brand_name, thumbnail, thumbnail_big', 'length', 'max'=>1000),
			array('rating', 'length', 'max'=>10),
			array('available', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, product_name, master_category_id, master_category_name, master_brand_id, master_brand_name, thumbnail, thumbnail_big, rating, available, date_added, date_modified', 'safe', 'on'=>'search'),
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
			'product_name' => 'Product Name',
			'master_category_id' => 'Master Category',
			'master_category_name' => 'Master Category Name',
			'master_brand_id' => 'Master Brand',
			'master_brand_name' => 'Master Brand Name',
			'thumbnail' => 'Thumbnail',
			'thumbnail_big' => 'Thumbnail Big',
			'rating' => 'Rating',
			'available' => 'Available',
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
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('master_category_id',$this->master_category_id);
		$criteria->compare('master_category_name',$this->master_category_name,true);
		$criteria->compare('master_brand_id',$this->master_brand_id);
		$criteria->compare('master_brand_name',$this->master_brand_name,true);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('thumbnail_big',$this->thumbnail_big,true);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('available',$this->available,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
                        'defaultOrder'=>'id DESC',
                    ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductBrand the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
