<?php

/**
 * This is the model class for table "tbl_home_footer".
 *
 * The followings are the available columns in table 'tbl_home_footer':
 * @property string $footer_section_id
 * @property string $footer_section
 * @property string $footer_section_image
 * @property string $footer_section_url
 * @property string $footer_section_text
 * @property integer $footer_section_status
 * @property double $footer_section_lastupdate
 */
class footer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return footer the static model class
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
		return 'tbl_home_footer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('footer_section_status', 'numerical', 'integerOnly'=>true),
			array('footer_section_lastupdate', 'numerical'),
			array('footer_section, footer_section_image', 'length', 'max'=>50),
			array('footer_section_url', 'length', 'max'=>100),
			array('footer_section_text', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('footer_section_id, footer_section, footer_section_image, footer_section_url, footer_section_text, footer_section_status, footer_section_lastupdate', 'safe', 'on'=>'search'),
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
			'footer_section_id' => 'Footer Section',
			'footer_section' => 'Footer Section',
			'footer_section_image' => 'Footer Section Image',
			'footer_section_url' => 'Footer Section Url',
			'footer_section_text' => 'Footer Section Text',
			'footer_section_status' => 'Footer Section Status',
			'footer_section_lastupdate' => 'Footer Section Lastupdate',
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

		$criteria->compare('footer_section_id',$this->footer_section_id,true);
		$criteria->compare('footer_section',$this->footer_section,true);
		$criteria->compare('footer_section_image',$this->footer_section_image,true);
		$criteria->compare('footer_section_url',$this->footer_section_url,true);
		$criteria->compare('footer_section_text',$this->footer_section_text,true);
		$criteria->compare('footer_section_status',$this->footer_section_status);
		$criteria->compare('footer_section_lastupdate',$this->footer_section_lastupdate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}