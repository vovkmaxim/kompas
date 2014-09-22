<?php

/**
 * This is the model class for table "km_comments".
 *
 * The followings are the available columns in table 'km_comments':
 * @property string $id
 * @property string $events_id
 * @property string $competition_id
 * @property string $user_id
 * @property string $create_date
 * @property string $title
 * @property string $text
 *
 * The followings are the available model relations:
 * @property KmUser $user
 */
class Comments extends CActiveRecord
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
        "12" => 'декадря',
    );
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'km_comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, title, text', 'required'),
			array('events_id, competition_id, user_id', 'length', 'max'=>10),
			array('title', 'length', 'max'=>255),
			array('create_date, text', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, events_id, competition_id, user_id, create_date, title, text', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'KmUser', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'events_id' => 'Events',
			'competition_id' => 'Competition',
			'user_id' => 'User',
			'create_date' => 'Create Date',
			'title' => 'Title',
			'text' => 'Text',
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
		$criteria->compare('events_id',$this->events_id,true);
		$criteria->compare('competition_id',$this->competition_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comments the static model class
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
        
        public function explodeThisDateTime($date){
            $data1 = explode(' ', $date);
            $data1 = explode(':', $data1[1]);
            $data_str = '';
            $data_str .= $data1[0] . ':' .$data1[1];
            
           return $data_str;
        }
        
}
