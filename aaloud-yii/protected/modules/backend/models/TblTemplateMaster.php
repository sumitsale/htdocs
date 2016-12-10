<?php

/**
 * This is the model class for table "tbl_template_master".
 *
 * The followings are the available columns in table 'tbl_template_master':
 * @property string $TEMPLATE_MASTER_ID
 * @property string $TEMPLATE_NAME
 * @property string $TEMPLATE_FILE
 * @property string $QUERY_COUNT
 * @property string $XML_FILENAME
 */
class TblTemplateMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblTemplateMaster the static model class
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
		return 'tbl_template_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TEMPLATE_NAME', 'length', 'max'=>50),
			array('TEMPLATE_FILE', 'length', 'max'=>100),
			array('QUERY_COUNT', 'length', 'max'=>4),
			array('XML_FILENAME', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('TEMPLATE_MASTER_ID, TEMPLATE_NAME, TEMPLATE_FILE, QUERY_COUNT, XML_FILENAME', 'safe', 'on'=>'search'),
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
			'TEMPLATE_MASTER_ID' => 'Template Master',
			'TEMPLATE_NAME' => 'Template Name',
			'TEMPLATE_FILE' => 'Template File',
			'QUERY_COUNT' => 'Query Count',
			'XML_FILENAME' => 'Xml Filename',
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

		$criteria->compare('TEMPLATE_MASTER_ID',$this->TEMPLATE_MASTER_ID,true);
		$criteria->compare('TEMPLATE_NAME',$this->TEMPLATE_NAME,true);
		$criteria->compare('TEMPLATE_FILE',$this->TEMPLATE_FILE,true);
		$criteria->compare('QUERY_COUNT',$this->QUERY_COUNT,true);
		$criteria->compare('XML_FILENAME',$this->XML_FILENAME,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}