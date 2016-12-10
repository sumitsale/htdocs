<?php

/**
 * This is the model class for table "tbl_aa_comments".
 *
 * The followings are the available columns in table 'tbl_aa_comments':
 * @property string $comment_id
 * @property string $artist_id
 * @property string $user_id
 * @property string $comment
 * @property double $indate
 * @property double $last_updated
 * @property string $parent_id
 * @property string $comment_status
 * @property string $type
 */
class Comments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Comments the static model class
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
		return 'tbl_aa_comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, artist_id, user_id, comment', 'required'),
			array('indate, last_updated', 'numerical'),
			array('artist_id, user_id, parent_id', 'length', 'max'=>20),
			array('comment_status', 'length', 'max'=>2),
			array('type', 'length', 'max'=>10),
			array('comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('comment_id, artist_id, user_id, comment, indate, last_updated, parent_id, comment_status, type', 'safe', 'on'=>'search'),
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
			'comment_id' => 'Comment',
			'artist_id' => 'Artist',
			'user_id' => 'User',
			'comment' => 'Comment',
			'indate' => 'Indate',
			'last_updated' => 'Last Updated',
			'parent_id' => 'Parent',
			'comment_status' => 'Comment Status',
			'type' => 'Type',
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

		$criteria->compare('comment_id',$this->comment_id,true);
		$criteria->compare('artist_id',$this->artist_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('indate',$this->indate);
		$criteria->compare('last_updated',$this->last_updated);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('comment_status',$this->comment_status,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}