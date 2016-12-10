<?php

/**
 * This is the model class for table "tb1_home_flash_banner".
 *
 * The followings are the available columns in table 'tb1_home_flash_banner':
 * @property integer $id
 * @property string $url1
 * @property string $url2
 * @property string $url3
 * @property string $url4
 * @property string $url5
 * @property string $flash_file
 * @property string $created
 * @property string $modified
 */
class Tb1HomeFlashBanner extends CActiveRecord
{
	public $doc;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tb1HomeFlashBanner the static model class
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
		return 'tb1_home_flash_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url1, url2, url3, url4, url5', 'required'),
			array('url1, url2, url3, url4, url5', 'url'),
			array('url1, url2, url3, url4, url5, flash_file', 'length', 'max'=>100),
			
			
			
			array('created','default',
            			'value'=>new CDbExpression('NOW()'),
            			'setOnEmpty'=>false,'on'=>'insert'),
			
				array('modified','default',
           				'value'=>new CDbExpression('NOW()'),
            			'setOnEmpty'=>false,'on'=>'insert'),
						
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, url1, url2, url3, url4, url5, flash_file, created, modified', 'safe', 'on'=>'search'),
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
			'url1' => 'Url1',
			'url2' => 'Url2',
			'url3' => 'Url3',
			'url4' => 'Url4',
			'url5' => 'Url5',
			'flash_file' => 'Flash File',
			'created' => 'Created',
			'modified' => 'Modified',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('url1',$this->url1,true);
		$criteria->compare('url2',$this->url2,true);
		$criteria->compare('url3',$this->url3,true);
		$criteria->compare('url4',$this->url4,true);
		$criteria->compare('url5',$this->url5,true);
		$criteria->compare('flash_file',$this->flash_file,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}