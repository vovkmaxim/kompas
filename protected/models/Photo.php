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
	public function tableName()
	{
		return 'km_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_photo_id, user_id', 'required'),
			array('title, description', 'length', 'max'=>255),
			array('group_photo_id, user_id', 'length', 'max'=>10),
			array('path', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, path, group_photo_id, user_id', 'safe', 'on'=>'search'),
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
			'groupPhoto' => array(self::BELONGS_TO, 'KmGroupPhoto', 'group_photo_id'),
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
			'title' => 'Title',
			'description' => 'Description',
			'path' => 'Path',
			'group_photo_id' => 'Group Photo',
			'user_id' => 'User',
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
}
