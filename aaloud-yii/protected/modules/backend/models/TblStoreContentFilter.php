<?php

/**
 * This is the model class for table "tbl_store_content_filter".
 *
 * The followings are the available columns in table 'tbl_store_content_filter':
 * @property string $ID
 * @property string $CONTENT_ID
 * @property string $STORE_ID
 */
class TblStoreContentFilter extends CActiveRecord
{
	public $csvfile;
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblStoreContentFilter the static model class
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
		return 'tbl_store_content_filter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CONTENT_ID, STORE_ID', 'length', 'max'=>9000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, CONTENT_ID, STORE_ID', 'safe', 'on'=>'search'),
			//array('csvfile', 'required', 'on'=>'alert'),
			array('csvfile', 'file', 'types'=>'xlsx', 'on'=>'alert'),
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
			'ID' => 'ID',
			'CONTENT_ID' => 'Content',
			'STORE_ID' => 'Store',
			'csvfile' =>'csvfile',
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

		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('CONTENT_ID',$this->CONTENT_ID,true);
		$criteria->compare('STORE_ID',$this->STORE_ID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}