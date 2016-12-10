<?php

/**
 * This is the model class for table "tbl_aa_itunes".
 *
 * The followings are the available columns in table 'tbl_aa_itunes':
 * @property string $ALBUM_ID
 * @property string $ALBUM
 * @property string $ITUNE_URL
 * @property double $INDATE
 */
class TblAaItunes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblAaItunes the static model class
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
		return 'tbl_aa_itunes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ALBUM_ID,ALBUM,ITUNE_URL', 'required'),
			array('INDATE', 'numerical'),
			array('ALBUM_ID', 'length', 'max'=>20),
			array('ALBUM, ITUNE_URL', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ALBUM_ID, ALBUM, ITUNE_URL, INDATE', 'safe', 'on'=>'search'),
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
			'ALBUM_ID' => 'Album Id',
			'ALBUM' => 'Album',
			'ITUNE_URL' => 'Itune Url',
			'INDATE' => 'Indate',
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

		$criteria->compare('ALBUM_ID',$this->ALBUM_ID,true);
		$criteria->compare('ALBUM',$this->ALBUM,true);
		$criteria->compare('ITUNE_URL',$this->ITUNE_URL,true);
		$criteria->compare('INDATE',$this->INDATE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}