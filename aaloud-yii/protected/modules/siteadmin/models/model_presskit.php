<?php

/**
 * This is the model class for table "tbl_aa_presskit".
 *
 * The followings are the available columns in table 'tbl_aa_presskit':
 * @property string $Press_Kit_Id
 * @property string $Artist_Id
 * @property string $Pdf_File
 * @property string $Press_Kit_Status
 * @property double $Press_Kit_Indate
 */
class model_presskit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return model_presskit the static model class
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
		return 'tbl_aa_presskit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Press_Kit_Indate', 'numerical'),
			array('	Pdf_File','required'),
			array('Artist_Id', 'length', 'max'=>20),
			array('Pdf_File', 'length', 'max'=>250),
			//array('Pdf_File', 'file', 'types'=>'pdf, doc, xls, ppt'),

			array('Press_Kit_Status', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Press_Kit_Id, Artist_Id, Pdf_File, Press_Kit_Status, Press_Kit_Indate', 'safe', 'on'=>'search'),
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
			'Press_Kit_Id' => 'Press Kit',
			'Artist_Id' => 'Artist',
			'Pdf_File' => 'Pdf File',
			'Press_Kit_Status' => 'Press Kit Status',
			'Press_Kit_Indate' => 'Press Kit Indate',
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

		$criteria->compare('Press_Kit_Id',$this->Press_Kit_Id,true);
		$criteria->compare('Artist_Id',$this->Artist_Id,true);
		$criteria->compare('Pdf_File',$this->Pdf_File,true);
		$criteria->compare('Press_Kit_Status',$this->Press_Kit_Status,true);
		$criteria->compare('Press_Kit_Indate',$this->Press_Kit_Indate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}