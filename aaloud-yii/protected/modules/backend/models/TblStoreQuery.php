<?php

/**
 * This is the model class for table "tbl_store_query".
 *
 * The followings are the available columns in table 'tbl_store_query':
 * @property string $QUERY_ID
 * @property integer $QUERY_TYPE
 * @property integer $QUERY_VARIANT
 * @property string $QUERY_NAME
 * @property string $CRITERIA_ID
 * @property string $CATEGORY
 * @property string $GENRE
 * @property string $MOOD
 * @property string $CONTENT_TYPE_ID
 * @property string $ALBUM_TRACK
 * @property string $ARTIST
 * @property string $LANGUAGE
 * @property integer $ARTIST_REC_TYPE
 * @property integer $DURATION
 * @property string $TEMPLATE_ID
 * @property string $XML_FILE_NAME
 * @property integer $CRON_FREQUENCY
 * @property integer $MAX_RECORDS
 * @property string $MANUAL_RECORDS
 * @property string $CATELOG_DUMP
 * @property string $LAST_RUN_DATE
 * @property double $ADDED_ON
 * @property double $UPDATED_ON
 * @property string $LAST_UPDATED_BY
 * @property integer $SORT_ORDER
 * @property integer $STATUS
 * @property string $STORE_FRONT_ID
 * @property integer $IS_TOP_TEN
 * @property string $PROMO_ID
 * @property integer $IS_PROMOTIONAL
 */
class TblStoreQuery extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblStoreQuery the static model class
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
		return 'tbl_store_query';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('QUERY_TYPE, QUERY_VARIANT, ARTIST_REC_TYPE, DURATION, CRON_FREQUENCY, MAX_RECORDS, SORT_ORDER, STATUS, IS_TOP_TEN, IS_PROMOTIONAL', 'numerical', 'integerOnly'=>true),
			array('ADDED_ON, UPDATED_ON', 'numerical'),
			array('QUERY_NAME', 'length', 'max'=>25),
			array('CRITERIA_ID, CONTENT_TYPE_ID, TEMPLATE_ID, LAST_UPDATED_BY, PROMO_ID', 'length', 'max'=>9),
			array('ALBUM_TRACK', 'length', 'max'=>1),
			array('LANGUAGE', 'length', 'max'=>100),
			array('XML_FILE_NAME', 'length', 'max'=>50),
			array('STORE_FRONT_ID', 'length', 'max'=>20),
			array('CATEGORY, GENRE, MOOD, ARTIST, MANUAL_RECORDS, CATELOG_DUMP, LAST_RUN_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('QUERY_ID, QUERY_TYPE, QUERY_VARIANT, QUERY_NAME, CRITERIA_ID, CATEGORY, GENRE, MOOD, CONTENT_TYPE_ID, ALBUM_TRACK, ARTIST, LANGUAGE, ARTIST_REC_TYPE, DURATION, TEMPLATE_ID, XML_FILE_NAME, CRON_FREQUENCY, MAX_RECORDS, MANUAL_RECORDS, CATELOG_DUMP, LAST_RUN_DATE, ADDED_ON, UPDATED_ON, LAST_UPDATED_BY, SORT_ORDER, STATUS, STORE_FRONT_ID, IS_TOP_TEN, PROMO_ID, IS_PROMOTIONAL', 'safe', 'on'=>'search'),
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
			'QUERY_ID' => 'Query',
			'QUERY_TYPE' => 'Query Type',
			'QUERY_VARIANT' => 'Query Variant',
			'QUERY_NAME' => 'Query Name',
			'CRITERIA_ID' => 'Criteria',
			'CATEGORY' => 'Category',
			'GENRE' => 'Genre',
			'MOOD' => 'Mood',
			'CONTENT_TYPE_ID' => 'Content Type',
			'ALBUM_TRACK' => 'Album Track',
			'ARTIST' => 'Artist',
			'LANGUAGE' => 'Language',
			'ARTIST_REC_TYPE' => 'Artist Rec Type',
			'DURATION' => 'Duration',
			'TEMPLATE_ID' => 'Template',
			'XML_FILE_NAME' => 'Xml File Name',
			'CRON_FREQUENCY' => 'Cron Frequency',
			'MAX_RECORDS' => 'Max Records',
			'MANUAL_RECORDS' => 'Manual Records',
			'CATELOG_DUMP' => 'Catelog Dump',
			'LAST_RUN_DATE' => 'Last Run Date',
			'ADDED_ON' => 'Added On',
			'UPDATED_ON' => 'Updated On',
			'LAST_UPDATED_BY' => 'Last Updated By',
			'SORT_ORDER' => 'Sort Order',
			'STATUS' => 'Status',
			'STORE_FRONT_ID' => 'Store Front',
			'IS_TOP_TEN' => 'Is Top Ten',
			'PROMO_ID' => 'Promo',
			'IS_PROMOTIONAL' => 'Is Promotional',
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

		$criteria->compare('QUERY_ID',$this->QUERY_ID,true);
		$criteria->compare('QUERY_TYPE',$this->QUERY_TYPE);
		$criteria->compare('QUERY_VARIANT',$this->QUERY_VARIANT);
		$criteria->compare('QUERY_NAME',$this->QUERY_NAME,true);
		$criteria->compare('CRITERIA_ID',$this->CRITERIA_ID,true);
		$criteria->compare('CATEGORY',$this->CATEGORY,true);
		$criteria->compare('GENRE',$this->GENRE,true);
		$criteria->compare('MOOD',$this->MOOD,true);
		$criteria->compare('CONTENT_TYPE_ID',$this->CONTENT_TYPE_ID,true);
		$criteria->compare('ALBUM_TRACK',$this->ALBUM_TRACK,true);
		$criteria->compare('ARTIST',$this->ARTIST,true);
		$criteria->compare('LANGUAGE',$this->LANGUAGE,true);
		$criteria->compare('ARTIST_REC_TYPE',$this->ARTIST_REC_TYPE);
		$criteria->compare('DURATION',$this->DURATION);
		$criteria->compare('TEMPLATE_ID',$this->TEMPLATE_ID,true);
		$criteria->compare('XML_FILE_NAME',$this->XML_FILE_NAME,true);
		$criteria->compare('CRON_FREQUENCY',$this->CRON_FREQUENCY);
		$criteria->compare('MAX_RECORDS',$this->MAX_RECORDS);
		$criteria->compare('MANUAL_RECORDS',$this->MANUAL_RECORDS,true);
		$criteria->compare('CATELOG_DUMP',$this->CATELOG_DUMP,true);
		$criteria->compare('LAST_RUN_DATE',$this->LAST_RUN_DATE,true);
		$criteria->compare('ADDED_ON',$this->ADDED_ON);
		$criteria->compare('UPDATED_ON',$this->UPDATED_ON);
		$criteria->compare('LAST_UPDATED_BY',$this->LAST_UPDATED_BY,true);
		$criteria->compare('SORT_ORDER',$this->SORT_ORDER);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('STORE_FRONT_ID',$this->STORE_FRONT_ID,true);
		$criteria->compare('IS_TOP_TEN',$this->IS_TOP_TEN);
		$criteria->compare('PROMO_ID',$this->PROMO_ID,true);
		$criteria->compare('IS_PROMOTIONAL',$this->IS_PROMOTIONAL);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}