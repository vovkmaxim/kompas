<?php

/**
 * This is the model class for table "km_photo".
 *
 * The followings are the available columns in table 'km_photo':
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $path
 * @property string $group_photo_id
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property KmGroupPhoto $groupPhoto
 * @property KmUser $user
 */
class Photo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'km_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('group_photo_id, user_id', 'required'),
			array('title, description', 'length', 'max'=>255),
			array('group_photo_id, user_id', 'length', 'max'=>10),
			array('path','file','types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true,'on'=>'insert,update'),
			array('id, title, description, path, group_photo_id, user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'groupPhoto' => array(self::BELONGS_TO, 'GroupPhoto', 'group_photo_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Название',
			'description' => 'Описание',
			'path' => 'Фото',
			'group_photo_id' => 'Группа',
			'user_id' => 'Пользователь',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('group_photo_id',$this->group_photo_id,true);
		$criteria->compare('user_id',$this->user_id,true);
                $criteria->order = 'id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Photo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
                
        public function getPhoto(){    
            return '<img src="/thumbn/' . $this->path . '"  alt="' . $this->title . '">';
        }
                
        protected function beforeSave(){
            if(!parent::beforeSave())
                return false;
            if(($this->scenario=='insert' || $this->scenario=='update') &&
                ($document=CUploadedFile::getInstance($this,'path'))){
                $this->deleteDocument(); // старый документ удалим, потому что загружаем новый

                $this->path=$document;
                $this->path->saveAs(
                    Yii::getPathOfAlias('webroot.photo') . DIRECTORY_SEPARATOR . $this->path);
            }
            return true;
        }
        
        
        protected function beforeDelete(){
            if(!parent::beforeDelete())
                return false;
            $this->deleteDocument(); // удалили модель? удаляем и файл
            return true;
        }
        
        public function deleteDocument(){
            $documentPath=Yii::getPathOfAlias('webroot.photo') . DIRECTORY_SEPARATOR .
                $this->path;
            if(is_file($documentPath))
                unlink($documentPath);
        }
        
        public function getUserName(){
            $user = User::model()->find("id=:user_id", array(":user_id" => $this->user_id));
            if(is_object($user)){
                return $user->username;
            } else {
                return 'None';
            }             
        }
        
        public function getGroupPhotoName(){
            $group_photo = GroupPhoto::model()->find("id=:group_photo_id", array(":group_photo_id" => $this->group_photo_id));
            if(is_object($group_photo)){
                return $group_photo->title;
            } else {
                return 'None';
            }            
        }
        
        public function getAllGroupPhotoList(){
            $group_photo = GroupPhoto::model()->findAll();
            $return_list = array();
            $return_list[0] = "";
            foreach($group_photo as $group_photos){
                $return_list[$group_photos->id] = $group_photos->title;
            }
            return $return_list;
        }
}
