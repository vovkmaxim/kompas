<?php

/**
 * This is the model class for table "km_user".
 *
 * The followings are the available columns in table 'km_user':
 * @property string $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $lastname
 * @property string $data_birth
 * @property string $phone
 * @property string $sity
 * @property string $coutry
 * @property string $club
 * @property integer $status
 * @property integer $member
 *
 * The followings are the available model relations:
 * @property KmComments[] $kmComments
 * @property KmCompetitionRequest[] $kmCompetitionRequests
 * @property KmPhoto[] $kmPhotos
 * @property KmRole[] $kmRoles
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'km_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, member', 'numerical', 'integerOnly'=>true),
			array('email, username, password, name, lastname, phone, sity, coutry, club', 'length', 'max'=>255),
			array('data_birth', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, username, password, name, lastname, data_birth, phone, sity, coutry, club, status, member', 'safe', 'on'=>'search'),
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
			'kmComments' => array(self::HAS_MANY, 'KmComments', 'user_id'),
			'kmCompetitionRequests' => array(self::HAS_MANY, 'KmCompetitionRequest', 'user_id'),
			'kmPhotos' => array(self::HAS_MANY, 'KmPhoto', 'user_id'),
			'kmRoles' => array(self::MANY_MANY, 'KmRole', 'km_role_has_km_user(user_id, role_id)'),
		);
	}

        public function getRoleUser(){
            $role_id = KmRoleHasKmUser::model()->findAll('user_id=:user_id',array(
                                                            ':user_id'=>  $this->id,
                                                          ));
            if(!empty($role_id)){
                    foreach ($role_id as $roles){
                              $res_role_id[]=$roles->role_id;
                      }    
                      foreach($res_role_id as $id){
                          $role = Role::model()->findByPk($id);
                          $role_name[] = $role->role;
                      }            
                  return $role_name;  
            } else {
                return FALSE;
            } 
                
        }
        
        public function getRoleUserForAdmins(){
            $role_name = $this->getRoleUser();
            if($role_name){
                $return_str = "";
                    foreach($role_name as $name){
                        $return_str .= " - " . $name . ",<br>";
                    }            
                return $return_str;    
            }            
        }
        
        
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'username' => 'Username',
			'password' => 'Password',
			'name' => 'Name',
			'lastname' => 'Lastname',
			'data_birth' => 'Data Birth',
			'phone' => 'Phone',
			'sity' => 'Sity',
			'coutry' => 'Coutry',
			'club' => 'Club',
			'status' => 'Status',
			'member' => 'Member',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('data_birth',$this->data_birth,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('sity',$this->sity,true);
		$criteria->compare('coutry',$this->coutry,true);
		$criteria->compare('club',$this->club,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('member',$this->member);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
                
        public function getUserStatus($id){
            $status = User::model()->findByPk($id);
            if($status->status){
                return "<h4><span  style='color:#00FF66'>Активен</span></h4>";
            } else {
                return "<span style='color:red'>Не активирован</span>";
            }
        }
        
                
        public function getUserMember($id){
            $member = User::model()->findByPk($id);
            if($member->member){
                return "<h4><span  style='color:#00FF66'>Член клуба</span></h4>";
            } else {
                return "<span style='color:red'>Не член клуба</span>";
            }
        }
        
        public function getMemberColor($id){
            $member = User::model()->findByPk($id);
            if($member->member){
                return "red";
//                return "#00FF66";
            } else {
                return "red";
            }
        }
        
        
}
