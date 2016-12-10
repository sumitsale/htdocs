<?php

/**
 * This is the model class for table "tbl_artists".
 *
 * The followings are the available columns in table 'tbl_artists':
 * @property integer $ARTIST_ID
 * @property string $ARTIST_NAME
 * @property string $ARTIST_BIRTH_DATE
 * @property string $ARTIST_DEATH_DATE
 * @property string $ARTIST_GENDER
 * @property string $ARTIST_PORTAL
 * @property string $ARTIST_IS_CELEBRITY
 * @property string $ARTIST_TYPE
 * @property string $ARTIST_STATUS
 *
 * The followings are the available model relations:
 * @property TblArtistAliases[] $tblArtistAliases
 * @property TblLanguages[] $tblLanguages
 * @property TblArtistFiles[] $tblArtistFiles
 * @property TblGenres[] $tblGenres
 * @property TblArtistGroups[] $tblArtistGroups
 * @property TblArtistGroups[] $tblArtistGroups1
 * @property TblArtistNickNames[] $tblArtistNickNames
 * @property TblArtistRealNames[] $tblArtistRealNames
 * @property TblArtistRoleMap[] $tblArtistRoleMaps
 */
class TblArtists extends AltActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblArtists the static model class
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
		return 'TBL_ARTISTS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ARTIST_ID, ARTIST_NAME, ARTIST_STATUS', 'required'),
			array('ARTIST_ID', 'numerical', 'integerOnly'=>true),
			array('ARTIST_NAME, ARTIST_TYPE, ARTIST_STATUS', 'length', 'max'=>100),
			array('ARTIST_GENDER, ARTIST_IS_CELEBRITY', 'length', 'max'=>1),
			array('ARTIST_PORTAL', 'length', 'max'=>250),
			array('ARTIST_BIRTH_DATE, ARTIST_DEATH_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ARTIST_ID, ARTIST_NAME, ARTIST_BIRTH_DATE, ARTIST_DEATH_DATE, ARTIST_GENDER, ARTIST_PORTAL, ARTIST_IS_CELEBRITY, ARTIST_TYPE, ARTIST_STATUS', 'safe', 'on'=>'search'),
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
			'tblArtistAliases' => array(self::HAS_MANY, 'TblArtistAliases', 'ARTIST_ID'),
			'tblLanguages' => array(self::MANY_MANY, 'TblLanguages', 'tbl_artist_details(ARTIST_ID, LANGUAGE_ID)'),
			'tblArtistFiles' => array(self::HAS_MANY, 'TblArtistFiles', 'ARTIST_ID'),
			'tblGenres' => array(self::MANY_MANY, 'TblGenres', 'tbl_artist_genre_map(ARTIST_ID, GENRE_ID)'),
			'tblArtistGroups' => array(self::HAS_MANY, 'TblArtistGroups', 'ARTIST_GROUP_ID'),
			'tblArtistGroups1' => array(self::HAS_MANY, 'TblArtistGroups', 'ARTIST_ID'),
			'tblArtistNickNames' => array(self::HAS_MANY, 'TblArtistNickNames', 'ARTIST_ID'),
			'tblArtistRealNames' => array(self::HAS_MANY, 'TblArtistRealNames', 'ARTIST_ID'),
			'tblArtistRoleMaps' => array(self::HAS_MANY, 'TblArtistRoleMap', 'ARTIST_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ARTIST_ID' => 'Artist',
			'ARTIST_NAME' => 'Artist Name',
			'ARTIST_BIRTH_DATE' => 'Artist Birth Date',
			'ARTIST_DEATH_DATE' => 'Artist Death Date',
			'ARTIST_GENDER' => 'Artist Gender',
			'ARTIST_PORTAL' => 'Artist Portal',
			'ARTIST_IS_CELEBRITY' => 'Artist Is Celebrity',
			'ARTIST_TYPE' => 'Artist Type',
			'ARTIST_STATUS' => 'Artist Status',
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

		$criteria->compare('ARTIST_ID',$this->ARTIST_ID);
		$criteria->compare('ARTIST_NAME',$this->ARTIST_NAME,true);
		$criteria->compare('ARTIST_BIRTH_DATE',$this->ARTIST_BIRTH_DATE,true);
		$criteria->compare('ARTIST_DEATH_DATE',$this->ARTIST_DEATH_DATE,true);
		$criteria->compare('ARTIST_GENDER',$this->ARTIST_GENDER,true);
		$criteria->compare('ARTIST_PORTAL',$this->ARTIST_PORTAL,true);
		$criteria->compare('ARTIST_IS_CELEBRITY',$this->ARTIST_IS_CELEBRITY,true);
		$criteria->compare('ARTIST_TYPE',$this->ARTIST_TYPE,true);
		$criteria->compare('ARTIST_STATUS',$this->ARTIST_STATUS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}