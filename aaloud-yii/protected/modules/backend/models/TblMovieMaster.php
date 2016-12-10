<?php

/**
 * This is the model class for table "tbl_movie_master".
 *
 * The followings are the available columns in table 'tbl_movie_master':
 * @property string $id
 * @property string $metasea_property_id
 * @property string $metasea_content_code
 * @property string $vendor_id
 * @property string $title
 * @property string $rel_date
 * @property string $rel_date_site
 * @property integer $is_hd
 * @property string $censor_certificate
 * @property string $duration
 * @property integer $demo_play_time
 * @property double $critic_rating
 * @property double $user_rating
 * @property string $user_rating_count
 * @property string $img_120x170
 * @property string $img_125x195
 * @property string $img_180x255
 * @property string $img_200x110
 * @property string $img_440x225
 * @property string $language
 * @property string $starcast
 * @property string $director
 * @property string $producer
 * @property string $musicdirector
 * @property string $genre
 * @property string $keywords
 * @property string $added_on
 * @property string $updated_on
 */
class TblMovieMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblMovieMaster the static model class
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
		return 'tbl_movie_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, added_on', 'required'),
			array('is_hd, demo_play_time', 'numerical', 'integerOnly'=>true),
			array('critic_rating, user_rating', 'numerical'),
			array('id, vendor_id, censor_certificate, duration, user_rating_count', 'length', 'max'=>10),
			array('metasea_property_id', 'length', 'max'=>11),
			array('metasea_content_code, img_120x170, img_125x195, img_180x255, img_200x110, img_440x225', 'length', 'max'=>200),
			array('title', 'length', 'max'=>255),
			array('language', 'length', 'max'=>20),
			array('starcast', 'length', 'max'=>512),
			array('director, producer, musicdirector, keywords', 'length', 'max'=>256),
			array('genre', 'length', 'max'=>128),
			array('rel_date, rel_date_site, updated_on', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, metasea_property_id, metasea_content_code, vendor_id, title, rel_date, rel_date_site, is_hd, censor_certificate, duration, demo_play_time, critic_rating, user_rating, user_rating_count, img_120x170, img_125x195, img_180x255, img_200x110, img_440x225, language, starcast, director, producer, musicdirector, genre, keywords, added_on, updated_on', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'metasea_property_id' => 'Metasea Property',
			'metasea_content_code' => 'Metasea Content Code',
			'vendor_id' => 'Vendor',
			'title' => 'Title',
			'rel_date' => 'Rel Date',
			'rel_date_site' => 'Rel Date Site',
			'is_hd' => 'Is Hd',
			'censor_certificate' => 'Censor Certificate',
			'duration' => 'Duration',
			'demo_play_time' => 'Demo Play Time',
			'critic_rating' => 'Critic Rating',
			'user_rating' => 'User Rating',
			'user_rating_count' => 'User Rating Count',
			'img_120x170' => 'Img 120x170',
			'img_125x195' => 'Img 125x195',
			'img_180x255' => 'Img 180x255',
			'img_200x110' => 'Img 200x110',
			'img_440x225' => 'Img 440x225',
			'language' => 'Language',
			'starcast' => 'Starcast',
			'director' => 'Director',
			'producer' => 'Producer',
			'musicdirector' => 'Musicdirector',
			'genre' => 'Genre',
			'keywords' => 'Keywords',
			'added_on' => 'Added On',
			'updated_on' => 'Updated On',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('metasea_property_id',$this->metasea_property_id,true);
		$criteria->compare('metasea_content_code',$this->metasea_content_code,true);
		$criteria->compare('vendor_id',$this->vendor_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('rel_date',$this->rel_date,true);
		$criteria->compare('rel_date_site',$this->rel_date_site,true);
		$criteria->compare('is_hd',$this->is_hd);
		$criteria->compare('censor_certificate',$this->censor_certificate,true);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('demo_play_time',$this->demo_play_time);
		$criteria->compare('critic_rating',$this->critic_rating);
		$criteria->compare('user_rating',$this->user_rating);
		$criteria->compare('user_rating_count',$this->user_rating_count,true);
		$criteria->compare('img_120x170',$this->img_120x170,true);
		$criteria->compare('img_125x195',$this->img_125x195,true);
		$criteria->compare('img_180x255',$this->img_180x255,true);
		$criteria->compare('img_200x110',$this->img_200x110,true);
		$criteria->compare('img_440x225',$this->img_440x225,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('starcast',$this->starcast,true);
		$criteria->compare('director',$this->director,true);
		$criteria->compare('producer',$this->producer,true);
		$criteria->compare('musicdirector',$this->musicdirector,true);
		$criteria->compare('genre',$this->genre,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('added_on',$this->added_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}