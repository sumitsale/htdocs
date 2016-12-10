<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $type
 * @property string $activekey
 * @property string $lastvisit
 * @property string $superuser
 * @property string $status
 * @property string $firstname
 * @property string $address
 * @property integer $team_id
 */
class User extends CActiveRecord
{
public $old_password;
public $new_password;
public $con_password;
public $new_password_repeat;
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('username, password, email, type, activekey, lastvisit, superuser, status, firstname, address, team_id', 'required'),
			//array('team_id', 'numerical', 'integerOnly'=>true),
			//array('username, password, email, type, activekey, superuser, status, firstname', 'length', 'max'=>100),
			//array('address', 'length', 'max'=>255, 'on'=>'create'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email, type, activekey, lastvisit, superuser, status, firstname, address, team_id', 'safe', 'on'=>'search'),
			array('old_password, new_password, con_password', 'required', 'on'=>'changepassword'),
			array('new_password', 'length', 'max'=>50, 'on'=>'changepassword'),
			array('new_password', 'length', 'min'=>6, 'on'=>'changepassword'),
			array('new_password', 'compare', 'compareAttribute'=>'con_password', 'on'=>'changePassword'),
			

     

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
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'type' => 'Type',
			'activekey' => 'Activekey',
			'lastvisit' => 'Lastvisit',
			'superuser' => 'Superuser',
			'status' => 'Status',
			'firstname' => 'Firstname',
			'address' => 'Address',
			'team_id' => 'Team',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('activekey',$this->activekey,true);
		$criteria->compare('lastvisit',$this->lastvisit,true);
		$criteria->compare('superuser',$this->superuser,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('team_id',$this->team_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}