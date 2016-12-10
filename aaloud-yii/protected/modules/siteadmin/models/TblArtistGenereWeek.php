<?php

/**
 * This is the model class for table "tbl_artist_genere_week".
 *
 * The followings are the available columns in table 'tbl_artist_genere_week':
 * @property string $GENERE
 * @property double $UPDATED_ON
 */
class TblArtistGenereWeek extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblArtistGenereWeek the static model class
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
		return 'tbl_artist_genere_week';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('GENERE', 'required'),
			array('UPDATED_ON', 'numerical'),
			array('GENERE', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('GENERE, UPDATED_ON', 'safe', 'on'=>'search'),
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
			'GENERE' => 'Genere',
			'UPDATED_ON' => 'Updated On',
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

		$criteria->compare('GENERE',$this->GENERE,true);
		$criteria->compare('UPDATED_ON',$this->UPDATED_ON);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}