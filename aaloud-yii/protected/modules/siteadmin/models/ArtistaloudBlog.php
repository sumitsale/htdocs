<?php

/**
 * This is the model class for table "artistaloud_blog".
 *
 * The followings are the available columns in table 'artistaloud_blog':
 * @property string $id
 * @property string $blog_title
 * @property string $blog_image
 * @property string $blog_desc
 * @property string $blog_url
 * @property string $blog_status
 * @property string $date
 */
class ArtistaloudBlog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ArtistaloudBlog the static model class
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
		return 'artistaloud_blog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('blog_title, blog_desc, blog_url, date', 'required'),
			array('blog_title, blog_image, blog_url', 'length', 'max'=>800),
			array('blog_desc', 'length', 'max'=>1000),
			array('blog_status', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, blog_title, blog_image, blog_desc, blog_url, blog_status, date', 'safe', 'on'=>'search'),
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
			'blog_title' => 'Blog Title',
			'blog_image' => 'Blog Image',
			'blog_desc' => 'Blog Desc',
			'blog_url' => 'Blog Url',
			'blog_status' => 'Blog Status',
			'date' => 'Date',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('blog_title',$this->blog_title,true);
		$criteria->compare('blog_image',$this->blog_image,true);
		$criteria->compare('blog_desc',$this->blog_desc,true);
		$criteria->compare('blog_url',$this->blog_url,true);
		$criteria->compare('blog_status',$this->blog_status,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}