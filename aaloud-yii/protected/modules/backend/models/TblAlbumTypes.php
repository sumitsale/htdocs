<?php

/**
 * This is the model class for table "tbl_album_types".
 *
 * The followings are the available columns in table 'tbl_album_types':
 * @property integer $ALBUM_TYPE_ID
 * @property string $ALBUM_TYPE_NAME
 * @property string $ALBUM_DESCRIPTION
 */
class TblAlbumTypes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblAlbumTypes the static model class
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
		return 'tbl_album_types';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ALBUM_TYPE_NAME', 'required'),
			array('ALBUM_TYPE_NAME', 'length', 'max'=>50),
			array('ALBUM_DESCRIPTION', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ALBUM_TYPE_ID, ALBUM_TYPE_NAME, ALBUM_DESCRIPTION', 'safe', 'on'=>'search'),
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
			'ALBUM_TYPE_ID' => 'Album Type',
			'ALBUM_TYPE_NAME' => 'Album Type Name',
			'ALBUM_DESCRIPTION' => 'Album Description',
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

		$criteria->compare('ALBUM_TYPE_ID',$this->ALBUM_TYPE_ID);
		$criteria->compare('ALBUM_TYPE_NAME',$this->ALBUM_TYPE_NAME,true);
		$criteria->compare('ALBUM_DESCRIPTION',$this->ALBUM_DESCRIPTION,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}