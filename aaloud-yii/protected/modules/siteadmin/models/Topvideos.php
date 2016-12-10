<?php

/**
 * This is the model class for table "topvideos".
 *
 * The followings are the available columns in table 'topvideos':
 * @property string $video_name
 * @property integer $content_id
 * @property integer $priority
 * @property double $indate
 */
class Topvideos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Topvideos the static model class
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
		return 'topvideos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('video_name, content_id, priority, indate', 'required'),
			array('content_id, priority', 'numerical', 'integerOnly'=>true),
			array('indate', 'numerical'),
			array('video_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('video_name, content_id, priority, indate', 'safe', 'on'=>'search'),
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
			'video_name' => 'Video Name',
			'content_id' => 'Content',
			'priority' => 'Priority',
			'indate' => 'Indate',
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

		$criteria->compare('video_name',$this->video_name,true);
		$criteria->compare('content_id',$this->content_id);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('indate',$this->indate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}