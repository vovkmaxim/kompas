<?php

/**
 * This is the model class for table "km_file".
 *
 * The followings are the available columns in table 'km_file':
 * @property string $id
 * @property string $name
 * @property string $path
 * @property integer $type
 * @property string $events_id
 * @property string $competition_id
 *
 * The followings are the available model relations:
 * @property KmEvents $events
 * @property KmCompetition $competition
 */
class File extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'km_file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('events_id, competition_id', 'length', 'max'=>10),
//			array('path', 'safe'),
                        array('path','file','types'=>'doc,docx,xls,xlsx,odt,pdf',
                                'allowEmpty'=>true,'on'=>'insert,update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, type, events_id, competition_id', 'safe', 'on'=>'search'),
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
			'events' => array(self::BELONGS_TO, 'KmEvents', 'events_id'),
			'competition' => array(self::BELONGS_TO, 'KmCompetition', 'competition_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'path' => 'Файл',
			'type' => 'Тип',
			'events_id' => 'Новость(Статья)',
			'competition_id' => 'Событие(Тренировка - Соревнование)',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('events_id',$this->events_id,true);
		$criteria->compare('competition_id',$this->competition_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return File the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        protected function beforeSave(){
            if(!parent::beforeSave())
                return false;
            if(($this->scenario=='insert' || $this->scenario=='update') &&
                ($document=CUploadedFile::getInstance($this,'path'))){
                $this->deleteDocument(); // старый документ удалим, потому что загружаем новый

                $this->path=$document;
                $this->path->saveAs(
                    Yii::getPathOfAlias('webroot.media').DIRECTORY_SEPARATOR.$this->path);
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
            $documentPath=Yii::getPathOfAlias('webroot.media').DIRECTORY_SEPARATOR.
                $this->path;
            if(is_file($documentPath))
                unlink($documentPath);
        }
        
        public function viewsFile(){
            return "<a href='/media/" . $this->path . "' target='_blank' >" . $this->path  . "</a>";
        }
        
        public function getAllEventsList(){
            $events = Events::model()->findAll();
            $return_list = array();
            $return_list[0] = "";
            foreach($events as $event){
                $return_list[$event->id] = $event->title;
            }
            
            return $return_list;
        }
        
        public function getNameEvents(){
            $events = Events::model()->find("id=:events_id", array(":events_id" => $this->events_id));
            if($events != NULL){
                return $events->title;
            } else {
                return "NONE";
            }
        }
        
        public function getAllCompetitionList(){
            $competitions = Competition::model()->findAll();
            $return_list = array();
            $return_list[0] = "";
            foreach($competitions as $competition){
                $return_list[$competition->id] = $competition->title;
            }
            
            return $return_list;
        }
        
        public function getNameCompetition(){
            $competitions = Competition::model()->find("id=:competition_id", array(":competition_id" => $this->competition_id));
            if($competitions != NULL){
                return $competitions->title;
            } else {
                return "NONE";
            }
        }
        
        public function getType(){
            if($this->type == 1){
                return "Результаты";
            } else {
                return "Пояснения";
            }
        }
        
        
}
