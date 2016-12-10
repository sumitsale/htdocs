<?php

/**
 * This is the model class for table "enquiry".
 *
 * The followings are the available columns in table 'enquiry':
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $title
 * @property string $first_name
 * @property string $last_name
 * @property string $mobile
 * @property string $telephone
 * @property string $email_id
 * @property string $address
 * @property string $check_in
 * @property string $check_out
 * @property string $adult
 * @property string $chiled
 * @property string $no_of_room
 * @property string $estimate_budget
 * @property string $comment_and_reference
 * @property string $date_added
 * @property string $date_modified
 */
class Enquiry extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'enquiry';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, name, title, first_name, last_name, mobile, telephone, email_id, address, check_in, check_out, adult, chiled, no_of_room, estimate_budget, comment_and_reference, date_added, date_modified', 'required'),
			array('type, name, email_id, check_in, check_out, estimate_budget', 'length', 'max'=>500),
			array('title, adult, chiled, no_of_room', 'length', 'max'=>50),
			array('first_name, last_name, mobile, telephone', 'length', 'max'=>100),
			array('address, comment_and_reference', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, name, title, first_name, last_name, mobile, telephone, email_id, address, check_in, check_out, adult, chiled, no_of_room, estimate_budget, comment_and_reference, date_added, date_modified', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'name' => 'Name',
			'title' => 'Title',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'mobile' => 'Mobile',
			'telephone' => 'Telephone',
			'email_id' => 'Email',
			'address' => 'Address',
			'check_in' => 'Check In',
			'check_out' => 'Check Out',
			'adult' => 'Adult',
			'chiled' => 'Chiled',
			'no_of_room' => 'No Of Room',
			'estimate_budget' => 'Estimate Budget',
			'comment_and_reference' => 'Comment And Reference',
			'date_added' => 'Date Added',
			'date_modified' => 'Date Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('email_id',$this->email_id,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('check_in',$this->check_in,true);
		$criteria->compare('check_out',$this->check_out,true);
		$criteria->compare('adult',$this->adult,true);
		$criteria->compare('chiled',$this->chiled,true);
		$criteria->compare('no_of_room',$this->no_of_room,true);
		$criteria->compare('estimate_budget',$this->estimate_budget,true);
		$criteria->compare('comment_and_reference',$this->comment_and_reference,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Enquiry the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
