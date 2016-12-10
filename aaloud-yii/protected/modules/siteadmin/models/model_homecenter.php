<?php

/**
 * This is the model class for table "tbl_home_center".
 *
 * The followings are the available columns in table 'tbl_home_center':
 * @property string $center_section_id
 * @property string $center_section
 * @property string $center_section_image
 * @property string $center_section_url
 * @property string $center_section_text
 * @property integer $center_section_status
 * @property double $center_section_lastupdate
 */
class model_homecenter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return model_homecenter the static model class
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
		return 'tbl_home_center';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('center_section_status', 'numerical', 'integerOnly'=>true),
			array('center_section_lastupdate', 'numerical'),
			array('center_section, center_section_image', 'length', 'max'=>50),
			array('center_section_url', 'length', 'max'=>100),
			array('center_section_text', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('center_section_id, center_section, center_section_image, center_section_url, center_section_text, center_section_status, center_section_lastupdate', 'safe', 'on'=>'search'),
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
			'center_section_id' => 'Center Section',
			'center_section' => 'Center Section',
			'center_section_image' => 'Center Section Image',
			'center_section_url' => 'Center Section Url',
			'center_section_text' => 'Center Section Text',
			'center_section_status' => 'Center Section Status',
			'center_section_lastupdate' => 'Center Section Lastupdate',
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

		$criteria->compare('center_section_id',$this->center_section_id,true);
		$criteria->compare('center_section',$this->center_section,true);
		$criteria->compare('center_section_image',$this->center_section_image,true);
		$criteria->compare('center_section_url',$this->center_section_url,true);
		$criteria->compare('center_section_text',$this->center_section_text,true);
		$criteria->compare('center_section_status',$this->center_section_status);
		$criteria->compare('center_section_lastupdate',$this->center_section_lastupdate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}