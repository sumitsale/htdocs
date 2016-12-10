<?php

/**
 * This is the model class for table "tbl_content_details".
 *
 * The followings are the available columns in table 'tbl_content_details':
 * @property integer $CONTENT_ID
 * @property string $LANGUAGE_ID
 * @property string $CONTENT_TITLE
 * @property string $CONTENT_DESCRIPTION
 * @property string $CONTENT_KEYWORDS
 * @property string $CONTENT_SUMMARIZED_DESC
 * @property string $CONTENT_P_LINE
 * @property string $CONTENT_C_LINE
 */
class ContentDetails extends AltActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ContentDetails the static model class
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
		return 'TBL_CONTENT_DETAILS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CONTENT_ID, LANGUAGE_ID, CONTENT_P_LINE, CONTENT_C_LINE', 'required'),
			array('CONTENT_ID', 'numerical', 'integerOnly'=>true),
			array('LANGUAGE_ID', 'length', 'max'=>3),
			array('CONTENT_TITLE', 'length', 'max'=>250),
			array('CONTENT_DESCRIPTION', 'length', 'max'=>4000),
			array('CONTENT_KEYWORDS, CONTENT_SUMMARIZED_DESC', 'length', 'max'=>2000),
			array('CONTENT_P_LINE, CONTENT_C_LINE', 'length', 'max'=>100),
		
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CONTENT_ID, LANGUAGE_ID, CONTENT_TITLE, CONTENT_DESCRIPTION, CONTENT_KEYWORDS, CONTENT_SUMMARIZED_DESC, CONTENT_P_LINE, CONTENT_C_LINE', 'safe', 'on'=>'search'),
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
			'CONTENT_ID' => 'Content',
			'LANGUAGE_ID' => 'Language',
			'CONTENT_TITLE' => 'Content Title',
			'CONTENT_DESCRIPTION' => 'Content Description',
			'CONTENT_KEYWORDS' => 'Content Keywords',
			'CONTENT_SUMMARIZED_DESC' => 'Content Summarized Desc',
			'CONTENT_P_LINE' => 'Content P Line',
			'CONTENT_C_LINE' => 'Content C Line',
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

		$criteria->compare('CONTENT_ID',$this->CONTENT_ID);
		$criteria->compare('LANGUAGE_ID',$this->LANGUAGE_ID,true);
		$criteria->compare('CONTENT_TITLE',$this->CONTENT_TITLE,true);
		$criteria->compare('CONTENT_DESCRIPTION',$this->CONTENT_DESCRIPTION,true);
		$criteria->compare('CONTENT_KEYWORDS',$this->CONTENT_KEYWORDS,true);
		$criteria->compare('CONTENT_SUMMARIZED_DESC',$this->CONTENT_SUMMARIZED_DESC,true);
		$criteria->compare('CONTENT_P_LINE',$this->CONTENT_P_LINE,true);
		$criteria->compare('CONTENT_C_LINE',$this->CONTENT_C_LINE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}