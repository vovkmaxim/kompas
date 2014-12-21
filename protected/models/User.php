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
 * @property string $avatar
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
    
    
       private $monts = array(
        "01" => 'января',
        "02" => 'февраля',
        "03" => 'марта',
        "04" => 'апреля',
        "05" => 'мая',
        "06" => 'июня',
        "07" => 'июля',
        "08" => 'августа',
        "09" => 'сентября',
        "10" => 'октября',
        "11" => 'ноября',
        "12" => 'декабря',
        "00" => ' ',
    );
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
                        array('email, username, password, name, lastname, phone, sity, coutry,data_birth', 'required'),
                        array('data_birth', 'date', 'format'=>'yyyy-M-d'),
//			array('status, member', 'numerical', 'integerOnly'=>true),
                        array('email', 'email'),
//                        array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
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
			'name' => 'Имя',
			'lastname' => 'Фамилия',
			'data_birth' => 'Дата рождения',
			'phone' => 'Телефон',
			'sity' => 'Город',
			'coutry' => 'Страна',
			'club' => 'Спортивный клуб',
			'status' => 'Status',
			'member' => 'Member',
                        'avatar' => 'Avatar',
//                        'verifyCode'=>'Verification Code',
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
                $criteria->compare('avatar',$this->avatar);
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
        
                
        public function explodeThisDate($date){
            $data1 = explode(' ', $date);
            $data1 = explode('-', $data1[0]);
            $data_str = '';
            $data_str .= $data1[2] . ' ' . $this->monts[$data1[1]] . ' ' . $data1[0] . '';
            
           return $data_str;
        }
        
         
        public function getAvatar(){
            if(!empty($this->avatar)){
                 return '<a class="fancybox th radius" rel="gallery1" href="/avatar/'. $this->avatar . '"><img width="147" height="115"  src="/thumbn_avatar/'. $this->avatar . '" alt="avatar" /></a> ';
            }
            return NULL;
        }
        
}
