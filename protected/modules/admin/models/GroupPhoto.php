<?php

/**
 * This is the model class for table "km_group_photo".
 *
 * The followings are the available columns in table 'km_group_photo':
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $parent_id
 *
 * The followings are the available model relations:
 * @property GroupPhoto $parent
 * @property GroupPhoto[] $kmGroupPhotos
 * @property KmPhoto[] $kmPhotos
 */
class GroupPhoto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'km_group_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description', 'required'),
			array('title, description', 'length', 'max'=>255),
			array('parent_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, parent_id', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'GroupPhoto', 'parent_id'),
			'kmGroupPhotos' => array(self::HAS_MANY, 'GroupPhoto', 'parent_id'),
			'kmPhotos' => array(self::HAS_MANY, 'KmPhoto', 'group_photo_id'),
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
			'parent_id' => 'Родитель',
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
		$criteria->compare('parent_id',$this->parent_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GroupPhoto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getParentGroupName($id){
            $title = GroupPhoto::model()->findAllByPk($id);
            try {
                $parent_id = $title[0]->parent_id;
                $title = GroupPhoto::model()->findAllByPk($parent_id);
                if(!empty($title)){
                   $return = $title[0]->title; 
                } else {
                   $return = 'NONE'; 
                }
            } catch (Exception $e) {
                $return = 'NONE';
            } 
            return $return;
        }
        
        public function getAllParentGroupName(){
            $title = GroupPhoto::model()->findAll();
            $all_titles=array();
            foreach ($title as $titles){
                try{
                    $all_titles[$titles->id] = $titles->title;
                }  catch (\Exception $e){}                
            }            
            return $all_titles;
        }
        
}
