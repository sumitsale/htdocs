<?php

/**
 * This is the model class for table "tbl_category_details".
 *
 * The followings are the available columns in table 'tbl_category_details':
 * @property string $CATEGORY_DETAILS_ID
 * @property string $CATEGORY_ID
 * @property string $CONTENT_TYPE_ID
 * @property string $STORE_FRONT_ID
 * @property string $THEME_IMAGE
 * @property string $PARENT_ID
 * @property string $TAG_MAP
 * @property integer $STATUS
 * @property double $LAST_UPDATED_ON
 * @property string $LAST_UPDATED_BY
 * @property string $PRIORITY
 * @property string $ISNEW
 * @property string $TRACK_CATELOG_ID
 * @property string $ALBUM_CATELOG_ID
 * @property string $ARTIST_CATELOG_ID
 * @property string $CATEGORY_LANGUAGE_ID
 */
class TblCategoryDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblCategoryDetails the static model class
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
		return 'tbl_category_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('STATUS', 'numerical', 'integerOnly'=>true),
			array('LAST_UPDATED_ON', 'numerical'),
			array('CATEGORY_ID, CONTENT_TYPE_ID, STORE_FRONT_ID, PARENT_ID, LAST_UPDATED_BY, PRIORITY', 'length', 'max'=>9),
			array('THEME_IMAGE', 'length', 'max'=>75),
			array('ISNEW', 'length', 'max'=>10),
			array('TRACK_CATELOG_ID, ALBUM_CATELOG_ID, ARTIST_CATELOG_ID, CATEGORY_LANGUAGE_ID', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CATEGORY_DETAILS_ID, CATEGORY_ID, CONTENT_TYPE_ID, STORE_FRONT_ID, THEME_IMAGE, PARENT_ID, TAG_MAP, STATUS, LAST_UPDATED_ON, LAST_UPDATED_BY, PRIORITY, ISNEW, TRACK_CATELOG_ID, ALBUM_CATELOG_ID, ARTIST_CATELOG_ID, CATEGORY_LANGUAGE_ID', 'safe', 'on'=>'search'),
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
			'CATEGORY_DETAILS_ID' => 'Category Details',
			'CATEGORY_ID' => 'Category',
			'CONTENT_TYPE_ID' => 'Content Type',
			'STORE_FRONT_ID' => 'Store Front',
			'THEME_IMAGE' => 'Theme Image',
			'PARENT_ID' => 'Parent',
			'TAG_MAP' => 'Tag Map',
			'STATUS' => 'Status',
			'LAST_UPDATED_ON' => 'Last Updated On',
			'LAST_UPDATED_BY' => 'Last Updated By',
			'PRIORITY' => 'Priority',
			'ISNEW' => 'Isnew',
			'TRACK_CATELOG_ID' => 'Track Catelog',
			'ALBUM_CATELOG_ID' => 'Album Catelog',
			'ARTIST_CATELOG_ID' => 'Artist Catelog',
			'CATEGORY_LANGUAGE_ID' => 'Category Language',
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

		$criteria->compare('CATEGORY_DETAILS_ID',$this->CATEGORY_DETAILS_ID,true);
		$criteria->compare('CATEGORY_ID',$this->CATEGORY_ID,true);
		$criteria->compare('CONTENT_TYPE_ID',$this->CONTENT_TYPE_ID,true);
		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);
		$criteria->compare('THEME_IMAGE',$this->THEME_IMAGE,true);
		$criteria->compare('PARENT_ID',$this->PARENT_ID,true);
		$criteria->compare('TAG_MAP',$this->TAG_MAP,true);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('LAST_UPDATED_ON',$this->LAST_UPDATED_ON);
		$criteria->compare('LAST_UPDATED_BY',$this->LAST_UPDATED_BY,true);
		$criteria->compare('PRIORITY',$this->PRIORITY,true);
		$criteria->compare('ISNEW',$this->ISNEW,true);
		$criteria->compare('TRACK_CATELOG_ID',$this->TRACK_CATELOG_ID,true);
		$criteria->compare('ALBUM_CATELOG_ID',$this->ALBUM_CATELOG_ID,true);
		$criteria->compare('ARTIST_CATELOG_ID',$this->ARTIST_CATELOG_ID,true);
		$criteria->compare('CATEGORY_LANGUAGE_ID',$this->CATEGORY_LANGUAGE_ID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}