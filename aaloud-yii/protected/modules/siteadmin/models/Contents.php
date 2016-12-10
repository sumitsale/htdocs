<?php

/**
 * This is the model class for table "tbl_contents".
 *
 * The followings are the available columns in table 'tbl_contents':
 * @property integer $CONTENT_ID
 * @property string $STATUS
 * @property integer $PROPERTY_ID
 * @property string $CONTENT_CODE
 * @property string $IS_MOVIE
 * @property integer $VENDOR_ID
 * @property string $CONTENT_COUNTRY_OF_ORIGIN
 * @property string $IS_ENABLED
 * @property string $CONTENT_ADDED_ON
 * @property string $CONTENT_IS_EXPLICIT
 * @property string $CONTENT_IS_NUDITY
 * @property string $CONTENT_IS_PARENTAL_ADV
 * @property integer $VERSION_ID
 * @property string $ALBUM_REPORTING_ID
 * @property integer $CONTENT_TYPE_ID
 * @property string $CONTENT_IS_COMPILATION
 * @property string $CONTENT_EXPIRY
 *
 * The followings are the available model relations:
 * @property TblArtistRoleMap[] $tblArtistRoleMaps
 * @property TblCntArtRoleMapDtls[] $tblCntArtRoleMapDtls
 * @property TblContentAbbreviations[] $tblContentAbbreviations
 * @property TblContentAka[] $tblContentAkas
 * @property TblContentAttributes[] $tblContentAttributes
 * @property TblLanguages[] $tblLanguages
 * @property TblFiles[] $tblFiles
 * @property TblGenres[] $tblGenres
 * @property TblContentLet[] $tblContentLets
 * @property TblContentLocaleAttributes[] $tblContentLocaleAttributes
 * @property TblMoods[] $tblMoods
 * @property TblContentOtherArtists[] $tblContentOtherArtists
 * @property TblContentReleaseDates[] $tblContentReleaseDates
 * @property TblContentRightsMap[] $tblContentRightsMaps
 * @property TblContentShootCountries[] $tblContentShootCountries
 * @property TblContentShootLocations[] $tblContentShootLocations
 * @property TblSubGenres[] $tblSubGenres
 * @property TblContentTagLines[] $tblContentTagLines
 * @property TblContentTagMap[] $tblContentTagMaps
 * @property TblCountries $cONTENTCOUNTRYOFORIGIN
 * @property TblProperties $pROPERTY
 * @property TblVendors $vENDOR
 * @property TblEventExtra $tblEventExtra
 * @property TblGameModes[] $tblGameModes
 * @property TblMovieExtra $tblMovieExtra
 * @property TblMusicExtra $tblMusicExtra
 * @property TblPackageContentMap[] $tblPackageContentMaps
 * @property TblPackageContentMap[] $tblPackageContentMaps1
 */
class Contents extends AltActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Contents the static model class
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
		return 'tbl_contents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CONTENT_ID, STATUS, PROPERTY_ID, CONTENT_CODE, VENDOR_ID, CONTENT_COUNTRY_OF_ORIGIN, CONTENT_ADDED_ON, CONTENT_IS_EXPLICIT, CONTENT_IS_NUDITY, CONTENT_IS_PARENTAL_ADV, VERSION_ID, CONTENT_IS_COMPILATION', 'required'),
			array('CONTENT_ID, PROPERTY_ID, VENDOR_ID, VERSION_ID, CONTENT_TYPE_ID', 'numerical', 'integerOnly'=>true),
			array('STATUS', 'length', 'max'=>11),
			array('CONTENT_CODE, ALBUM_REPORTING_ID', 'length', 'max'=>100),
			array('IS_MOVIE, IS_ENABLED, CONTENT_IS_EXPLICIT, CONTENT_IS_NUDITY, CONTENT_IS_PARENTAL_ADV, CONTENT_IS_COMPILATION', 'length', 'max'=>1),
			array('CONTENT_COUNTRY_OF_ORIGIN', 'length', 'max'=>2),
			array('CONTENT_EXPIRY', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CONTENT_ID, STATUS, PROPERTY_ID, CONTENT_CODE, IS_MOVIE, VENDOR_ID, CONTENT_COUNTRY_OF_ORIGIN, IS_ENABLED, CONTENT_ADDED_ON, CONTENT_IS_EXPLICIT, CONTENT_IS_NUDITY, CONTENT_IS_PARENTAL_ADV, VERSION_ID, ALBUM_REPORTING_ID, CONTENT_TYPE_ID, CONTENT_IS_COMPILATION, CONTENT_EXPIRY', 'safe', 'on'=>'search'),
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
			'tblArtistRoleMaps' => array(self::MANY_MANY, 'TblArtistRoleMap', 'tbl_cnt_art_role_map(CONTENT_ID, ARTIST_ROLE_MAP_ID)'),
			'tblCntArtRoleMapDtls' => array(self::HAS_MANY, 'TblCntArtRoleMapDtls', 'CONTENT_ID'),
			'tblContentAbbreviations' => array(self::HAS_MANY, 'TblContentAbbreviations', 'CONTENT_ID'),
			'tblContentAkas' => array(self::HAS_MANY, 'TblContentAka', 'CONTENT_ID'),
			'tblContentAttributes' => array(self::HAS_MANY, 'TblContentAttributes', 'CONTENT_ID'),
			'tblLanguages' => array(self::MANY_MANY, 'TblLanguages', 'tbl_movie_details(CONTENT_ID, LANGUAGE_ID)'),
			'tblFiles' => array(self::MANY_MANY, 'TblFiles', 'tbl_content_files(CONTENT_ID, FILE_ID)'),
			'tblGenres' => array(self::MANY_MANY, 'TblGenres', 'tbl_content_genre_map(CONTENT_ID, GENRE_ID)'),
			'tblContentLets' => array(self::HAS_MANY, 'TblContentLet', 'CONTENT_ID'),
			'tblContentLocaleAttributes' => array(self::HAS_MANY, 'TblContentLocaleAttributes', 'CONTENT_ID'),
			'tblMoods' => array(self::MANY_MANY, 'TblMoods', 'tbl_content_mood_map(CONTENT_ID, MOOD_ID)'),
			'tblContentOtherArtists' => array(self::HAS_MANY, 'TblContentOtherArtists', 'CONTENT_ID'),
			'tblContentReleaseDates' => array(self::HAS_MANY, 'TblContentReleaseDates', 'CONTENT_ID'),
			'tblContentRightsMaps' => array(self::HAS_MANY, 'TblContentRightsMap', 'CONTENT_ID'),
			'tblContentShootCountries' => array(self::HAS_MANY, 'TblContentShootCountries', 'CONTENT_ID'),
			'tblContentShootLocations' => array(self::HAS_MANY, 'TblContentShootLocations', 'CONTENT_ID'),
			'tblSubGenres' => array(self::MANY_MANY, 'TblSubGenres', 'tbl_content_sub_genre_map(CONTENT_ID, SUB_GENRE_ID)'),
			'tblContentTagLines' => array(self::HAS_MANY, 'TblContentTagLines', 'CONTENT_ID'),
			'tblContentTagMaps' => array(self::HAS_MANY, 'TblContentTagMap', 'CONTENT_ID'),
			'cONTENTCOUNTRYOFORIGIN' => array(self::BELONGS_TO, 'TblCountries', 'CONTENT_COUNTRY_OF_ORIGIN'),
			'pROPERTY' => array(self::BELONGS_TO, 'TblProperties', 'PROPERTY_ID'),
			'vENDOR' => array(self::BELONGS_TO, 'TblVendors', 'VENDOR_ID'),
			'tblEventExtra' => array(self::HAS_ONE, 'TblEventExtra', 'CONTENT_ID'),
			'tblGameModes' => array(self::MANY_MANY, 'TblGameModes', 'tbl_game_extra(CONTENT_ID, GAME_MODE_ID)'),
			'tblMovieExtra' => array(self::HAS_ONE, 'TblMovieExtra', 'CONTENT_ID'),
			'tblMusicExtra' => array(self::HAS_ONE, 'TblMusicExtra', 'CONTENT_ID'),
			'tblPackageContentMaps' => array(self::HAS_MANY, 'TblPackageContentMap', 'PACKAGE_CONTENT_ID'),
			'tblPackageContentMaps1' => array(self::HAS_MANY, 'TblPackageContentMap', 'CONTENT_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CONTENT_ID' => 'Content',
			'STATUS' => 'Status',
			'PROPERTY_ID' => 'Property',
			'CONTENT_CODE' => 'Content Code',
			'IS_MOVIE' => 'Is Movie',
			'VENDOR_ID' => 'Vendor',
			'CONTENT_COUNTRY_OF_ORIGIN' => 'Content Country Of Origin',
			'IS_ENABLED' => 'Is Enabled',
			'CONTENT_ADDED_ON' => 'Content Added On',
			'CONTENT_IS_EXPLICIT' => 'Content Is Explicit',
			'CONTENT_IS_NUDITY' => 'Content Is Nudity',
			'CONTENT_IS_PARENTAL_ADV' => 'Content Is Parental Adv',
			'VERSION_ID' => 'Version',
			'ALBUM_REPORTING_ID' => 'Album Reporting',
			'CONTENT_TYPE_ID' => 'Content Type',
			'CONTENT_IS_COMPILATION' => 'Content Is Compilation',
			'CONTENT_EXPIRY' => 'Content Expiry',
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

		$criteria->compare('CONTENT_ID',$this->CONTENT_ID);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('PROPERTY_ID',$this->PROPERTY_ID);
		$criteria->compare('CONTENT_CODE',$this->CONTENT_CODE,true);
		$criteria->compare('IS_MOVIE',$this->IS_MOVIE,true);
		$criteria->compare('VENDOR_ID',$this->VENDOR_ID);
		$criteria->compare('CONTENT_COUNTRY_OF_ORIGIN',$this->CONTENT_COUNTRY_OF_ORIGIN,true);
		$criteria->compare('IS_ENABLED',$this->IS_ENABLED,true);
		$criteria->compare('CONTENT_ADDED_ON',$this->CONTENT_ADDED_ON,true);
		$criteria->compare('CONTENT_IS_EXPLICIT',$this->CONTENT_IS_EXPLICIT,true);
		$criteria->compare('CONTENT_IS_NUDITY',$this->CONTENT_IS_NUDITY,true);
		$criteria->compare('CONTENT_IS_PARENTAL_ADV',$this->CONTENT_IS_PARENTAL_ADV,true);
		$criteria->compare('VERSION_ID',$this->VERSION_ID);
		$criteria->compare('ALBUM_REPORTING_ID',$this->ALBUM_REPORTING_ID,true);
		$criteria->compare('CONTENT_TYPE_ID',$this->CONTENT_TYPE_ID);
		$criteria->compare('CONTENT_IS_COMPILATION',$this->CONTENT_IS_COMPILATION,true);
		$criteria->compare('CONTENT_EXPIRY',$this->CONTENT_EXPIRY,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}