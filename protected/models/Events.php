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
			array('type, position', 'length', 'max'=>10),
			array('title, description, author, logo_title', 'length', 'max'=>255),
			array('logo_path', 'length', 'max'=>555),
			array('create_date, update_date, text', 'safe'),
			array('id, type, title, description, author, create_date, update_date, position, text, logo_title, logo_path', 'safe', 'on'=>'search'),
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
        
        /**
         * Method return images for this events
         * 
         * @return string
         */
        public function getEventsImage(){    
            return '<img src="logo_events/' . $this->logo_path . '"  width="147" height="115" alt="' . $this->logo_title . '">';
        }
        
        
        public function getCommentCount(){
            $comment = Comments::model()->findAll('events_id=:id', array(':id' => $this->id));
            if($comment != NULL){
                return count($comment);
            } else {
                return 0;
            }
        }
}
