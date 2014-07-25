<?php

/**
 * This is the model class for table "km_competition".
 *
 * The followings are the available columns in table 'km_competition':
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $logo_desc
 * @property string $text
 * @property string $create_date
 * @property string $update_date
 * @property string $start_data
 * @property string $start_time
 * @property string $end_data
 * @property string $end_time
 * @property string $close_registration_data
 * @property string $close_registration_time
 * @property integer $enable_registration_flag
 * @property string $position
 * @property integer $archive
 *
 * The followings are the available model relations:
 * @property KmComments[] $kmComments
 * @property KmGroup[] $kmGroups
 * @property KmCompetitionRequest[] $kmCompetitionRequests
 * @property KmFile[] $kmFiles
 */
class Competition extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'km_competition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('enable_registration_flag, archive', 'numerical', 'integerOnly'=>true),
			array('title, description, logo_desc', 'length', 'max'=>255),
			array('type, position', 'length', 'max'=>10),
			array('text, create_date, update_date, start_data, start_time, end_data, end_time, close_registration_data, close_registration_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, type, logo_desc, text, create_date, update_date, start_data, start_time, end_data, end_time, close_registration_data, close_registration_time, enable_registration_flag, position, archive', 'safe', 'on'=>'search'),
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
			'kmComments' => array(self::HAS_MANY, 'KmComments', 'competition_id'),
			'kmGroups' => array(self::MANY_MANY, 'KmGroup', 'km_competition_group_refs(km_competition_id, km_group_id)'),
			'kmCompetitionRequests' => array(self::HAS_MANY, 'KmCompetitionRequest', 'competition_id'),
			'kmFiles' => array(self::HAS_MANY, 'KmFile', 'competition_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'type' => 'Type',
			'logo_desc' => 'Logo Desc',
			'text' => 'Text',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
			'start_data' => 'Start Data',
			'start_time' => 'Start Time',
			'end_data' => 'End Data',
			'end_time' => 'End Time',
			'close_registration_data' => 'Close Registration Data',
			'close_registration_time' => 'Close Registration Time',
			'enable_registration_flag' => 'Enable Registration Flag',
			'position' => 'Position',
			'archive' => 'Archive',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('logo_desc',$this->logo_desc,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('start_data',$this->start_data,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('end_data',$this->end_data,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('close_registration_data',$this->close_registration_data,true);
		$criteria->compare('close_registration_time',$this->close_registration_time,true);
		$criteria->compare('enable_registration_flag',$this->enable_registration_flag);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('archive',$this->archive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Competition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
