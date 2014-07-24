<?php

/**
 * This is the model class for table "km_group".
 *
 * The followings are the available columns in table 'km_group':
 * @property string $id
 * @property string $name
 * @property string $parent_id
 *
 * The followings are the available model relations:
 * @property KmCompetition[] $kmCompetitions
 * @property KmCompetitionRequest[] $kmCompetitionRequests
 * @property Group $parent
 * @property Group[] $kmGroups
 */
class Group extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'km_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>255),
			array('parent_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, parent_id', 'safe', 'on'=>'search'),
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
			'kmCompetitions' => array(self::MANY_MANY, 'KmCompetition', 'km_competition_group_refs(km_group_id, km_competition_id)'),
			'kmCompetitionRequests' => array(self::HAS_MANY, 'KmCompetitionRequest', 'group_id'),
			'parent' => array(self::BELONGS_TO, 'Group', 'parent_id'),
			'kmGroups' => array(self::HAS_MANY, 'Group', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'parent_id' => 'Parent',
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
		$criteria->compare('parent_id',$this->parent_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Group the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
                
        public function getParentGroupName($id){
            $name = Group::model()->findAllByPk($id);
            $name = Group::model()->findAllByPk($name[0]->parent_id);
            return $name[0]->name;
        }
        
        public function getAllParentGroupName(){
            $name = Group::model()->findAll();
            foreach ($name as $names){
                $all_names[$names->id] = $names->name;
            }            
            return $all_names;
        }
        
}
