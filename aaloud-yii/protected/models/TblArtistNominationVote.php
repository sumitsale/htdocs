<?php

/**
 * This is the model class for table "tbl_artist_nomination_vote".
 *
 * The followings are the available columns in table 'tbl_artist_nomination_vote':
 * @property string $CONTENT_ID
 * @property string $GENERE
 * @property string $NOMINATION_FOR
 * @property string $IP_ADDRESS
 * @property string $LOGIN_FROM
 * @property string $INDATE
 */
 
class TblArtistNominationVote extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblArtistNominationVote the static model class
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
		return 'tbl_artist_nomination_vote';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CONTENT_ID', 'length', 'max'=>9),
			array('GENERE', 'length', 'max'=>255),
			array('NOMINATION_FOR', 'length', 'max'=>10),
			array('IP_ADDRESS', 'length', 'max'=>20),
			array('LOGIN_FROM', 'length', 'max'=>1),
			array('INDATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CONTENT_ID, GENERE, NOMINATION_FOR, IP_ADDRESS, LOGIN_FROM, INDATE', 'safe', 'on'=>'search'),
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
			'GENERE' => 'Genere',
			'NOMINATION_FOR' => 'Nomination For',
			'IP_ADDRESS' => 'Ip Address',
			'LOGIN_FROM' => 'Login From',
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

		$criteria->compare('CONTENT_ID',$this->CONTENT_ID,true);
		$criteria->compare('GENERE',$this->GENERE,true);
		$criteria->compare('NOMINATION_FOR',$this->NOMINATION_FOR,true);
		$criteria->compare('IP_ADDRESS',$this->IP_ADDRESS,true);
		$criteria->compare('LOGIN_FROM',$this->LOGIN_FROM,true);
		$criteria->compare('INDATE',$this->INDATE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}