<?php

/**
 * This is the model class for table "homepage_left_bottom".
 *
 * The followings are the available columns in table 'homepage_left_bottom':
 * @property integer $id
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $image4
 * @property string $image5
 * @property string $created
 * @property string $modified
 */
class HomepageLeftBottom extends CActiveRecord
{
public $doc;
	/**
	 * Returns the static model of the specified AR class.
	 * @return HomepageLeftBottom the static model class
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
		//return 'TBL_MODULES_USERS_TEMP';
		
		return 'homepage_left_bottom';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image1, image2, image3, image4, image5', 'required'),
			array('image1, image2, image3, image4, image5', 'length', 'max'=>255),
				array('created','default',
            			'value'=>new CDbExpression('NOW()'),
            			'setOnEmpty'=>false,'on'=>'insert'),
			
				array('modified','default',
           				'value'=>new CDbExpression('NOW()'),
            			'setOnEmpty'=>false,'on'=>'insert'),
						
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, image1, image2, image3, image4, image5, created, modified', 'safe', 'on'=>'search'),
			 array('image1, image2, image3, image4, image5','file','types'=>'jpg'),
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
			'image1' => 'Image1',
			'image2' => 'Image2',
			'image3' => 'Image3',
			'image4' => 'Image4',
			'image5' => 'Image5',
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
		$criteria->compare('image1',$this->image1,true);
		$criteria->compare('image2',$this->image2,true);
		$criteria->compare('image3',$this->image3,true);
		$criteria->compare('image4',$this->image4,true);
		$criteria->compare('image5',$this->image5,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}