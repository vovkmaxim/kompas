<?php

/**
 * This is the model class for table "km_events".
 *
 * The followings are the available columns in table 'km_events':
 * @property string $id
 * @property string $type
 * @property string $title
 * @property string $description
 * @property string $author
 * @property string $create_date
 * @property string $update_date
 * @property string $position
 * @property string $text
 * @property string $logo_title
 * @property string $logo_path
 * @property string $status
 *
 * The followings are the available model relations:
 * @property KmComments[] $kmComments
 * @property KmFile[] $kmFiles
 */
class Events extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'km_events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'length', 'max'=>10),
			array('title, description, author, logo_title', 'length', 'max'=>255),
                        array('logo_path', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true,'on'=>'insert,update'),
			array('text', 'safe'),
			array('id, type, title, description, author, create_date, update_date, position, text, logo_title, logo_path', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{       return array(
			'kmComments' => array(self::HAS_MANY, 'KmComments', 'events_id'),
			'kmFiles' => array(self::HAS_MANY, 'KmFile', 'events_id'),
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
			'title' => 'Title',
			'description' => 'Description',
			'author' => 'Author',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
			'position' => 'Position',
			'text' => 'Text',
			'logo_title' => 'Logo Title',
			'logo_path' => 'Logo Path',
			'status' => 'Status',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('logo_title',$this->logo_title,true);
		$criteria->compare('logo_path',$this->logo_path,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Events the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
                
        public function beforeSave() {
            if(!parent::beforeSave())
                return false;
            if(($this->scenario=='insert' || $this->scenario=='update') &&
                ($document=CUploadedFile::getInstance($this,'logo_path'))){
                $this->deleteDocument(); // старый документ удалим, потому что загружаем новый

                $this->logo_path=$document;
                $this->logo_path->saveAs(
                    Yii::getPathOfAlias('webroot.logo_events').DIRECTORY_SEPARATOR.$this->logo_path);
            }
            
            if ($this->isNewRecord){
                $this->create_date = date('Y-m-d H:i:s');
                $this->update_date = date('Y-m-d H:i:s');
            } else {
                $this->update_date = date('Y-m-d H:i:s');
            }                

            return parent::beforeSave();
        }
        
        public function getTypeForViews(){
            if($this->type == 1){
                return 'Новость';
            } else {
                return 'Статья';
            }
        }
        
        public function getStatusForViews(){
            if($this->status == 1){
                return "<h4><span  style='color:#00FF66'>Опубликованная</span></h4>";
            } else {
                return "<span style='color:red'>Не опубликованная</span>";
            }
        }
        
        /**
         * Method return images for this events
         * 
         * @return string
         */
        public function getEventsImage(){    
            return '<img src="logo_events/' . $this->logo_path . '"  width="147" height="115" alt="' . $this->logo_title . '">';
        }
               
        
        protected function beforeDelete(){
            if(!parent::beforeDelete())
                return false;
            $this->deleteDocument(); // удалили модель? удаляем и файл
            return true;
        }
        
        public function deleteDocument(){
            $documentPath=Yii::getPathOfAlias('webroot.logo_events').DIRECTORY_SEPARATOR.
                $this->logo_path;
            if(is_file($documentPath))
                unlink($documentPath);
        }
}
