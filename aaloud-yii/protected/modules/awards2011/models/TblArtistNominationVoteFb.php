<?php

/**
 * This is the model class for table "tbl_artist_nomination_vote_fb".
 *
 * The followings are the available columns in table 'tbl_artist_nomination_vote_fb':
 * @property string $FB_USER_ID
 * @property string $FB_EMAIL
 * @property string $FB_FNAME
 * @property string $FB_LNAME
 */
class TblArtistNominationVoteFb extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblArtistNominationVoteFb the static model class
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
		return 'tbl_artist_nomination_vote_fb';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FB_USER_ID', 'required'),
			array('FB_USER_ID', 'length', 'max'=>9),
			array('FB_EMAIL', 'length', 'max'=>100),
			array('FB_FNAME, FB_LNAME', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('FB_USER_ID, FB_EMAIL, FB_FNAME, FB_LNAME', 'safe', 'on'=>'search'),
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
			'FB_USER_ID' => 'Fb User',
			'FB_EMAIL' => 'Fb Email',
			'FB_FNAME' => 'Fb Fname',
			'FB_LNAME' => 'Fb Lname',
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

		$criteria->compare('FB_USER_ID',$this->FB_USER_ID,true);
		$criteria->compare('FB_EMAIL',$this->FB_EMAIL,true);
		$criteria->compare('FB_FNAME',$this->FB_FNAME,true);
		$criteria->compare('FB_LNAME',$this->FB_LNAME,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}