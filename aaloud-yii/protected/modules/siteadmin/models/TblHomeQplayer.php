<?php

/**
 * This is the model class for table "tbl_home_qplayer".
 *
 * The followings are the available columns in table 'tbl_home_qplayer':
 * @property string $PLAYERID
 * @property string $CONTENTID
 * @property string $CONTENTNAME
 * @property integer $PRIORITY
 * @property double $INDATE
 */
class TblHomeQplayer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblHomeQplayer the static model class
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
		return 'tbl_home_qplayer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CONTENTNAME', 'required'),
			array('PRIORITY', 'numerical', 'integerOnly'=>true),
			array('INDATE', 'numerical'),
			array('CONTENTID', 'length', 'max'=>20),
			array('CONTENTNAME', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PLAYERID, CONTENTID, CONTENTNAME, PRIORITY, INDATE', 'safe', 'on'=>'search'),
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
			'PLAYERID' => 'Playerid',
			'CONTENTID' => 'Contentid',
			'CONTENTNAME' => 'Track',
			'PRIORITY' => 'Priority',
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

		$criteria->compare('PLAYERID',$this->PLAYERID,true);
		$criteria->compare('CONTENTID',$this->CONTENTID,true);
		$criteria->compare('CONTENTNAME',$this->CONTENTNAME,true);
		$criteria->compare('PRIORITY',$this->PRIORITY);
		$criteria->compare('INDATE',$this->INDATE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}