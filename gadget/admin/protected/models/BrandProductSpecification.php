<?php

/**
 * This is the model class for table "brand_product_specification".
 *
 * The followings are the available columns in table 'brand_product_specification':
 * @property integer $id
 * @property integer $brand_product_id
 * @property string $main_title
 * @property string $sub_title
 * @property string $specification
 * @property string $date_added
 * @property string $date_modified
 */
class BrandProductSpecification extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'brand_product_specification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('brand_product_id, main_title, sub_title, specification, date_added, date_modified', 'required'),
			array('brand_product_id', 'numerical', 'integerOnly'=>true),
			array('main_title, sub_title', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, brand_product_id, main_title, sub_title, specification, date_added, date_modified', 'safe', 'on'=>'search'),
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
			'brand_product_id' => 'Brand Product',
			'main_title' => 'Main Title',
			'sub_title' => 'Sub Title',
			'specification' => 'Specification',
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
	public function search($brand_product_id ='')
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		if($brand_product_id!='')
		{
		 // $criteria->addCondition('brand_product_id',$brand_product_id);
		  $criteria->condition = "brand_product_id ='{$brand_product_id}'";
		}
		
		$criteria->compare('id',$this->id);
		// $criteria->compare('brand_product_id',$this->brand_product_id);
		$criteria->compare('main_title',$this->main_title,true);
		$criteria->compare('sub_title',$this->sub_title,true);
		$criteria->compare('specification',$this->specification,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
                        'defaultOrder'=>'main_title asc,id asc',
                    ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BrandProductSpecification the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
