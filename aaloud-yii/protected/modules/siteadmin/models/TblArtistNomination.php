<?php

/**
 * This is the model class for table "tbl_artist_nomination".
 *
 * The followings are the available columns in table 'tbl_artist_nomination':
 * @property string $NOMINATION_ID
 * @property string $GENERE
 * @property string $NOMINATION_FOR
 * @property string $CONTENT_ID
 */
class TblArtistNomination extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblArtistNomination the static model class
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
		return 'tbl_artist_nomination';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('GENERE', 'length', 'max'=>255),
			array('NOMINATION_FOR', 'length', 'max'=>4),
			array('CONTENT_ID', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('NOMINATION_ID, GENERE, NOMINATION_FOR, CONTENT_ID', 'safe', 'on'=>'search'),
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
			'NOMINATION_ID' => 'Nomination',
			'GENERE' => 'Genere',
			'NOMINATION_FOR' => 'Nomination For',
			'CONTENT_ID' => 'Content',
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

		$criteria->compare('NOMINATION_ID',$this->NOMINATION_ID,true);
		$criteria->compare('GENERE',$this->GENERE,true);
		$criteria->compare('NOMINATION_FOR',$this->NOMINATION_FOR,true);
		$criteria->compare('CONTENT_ID',$this->CONTENT_ID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}