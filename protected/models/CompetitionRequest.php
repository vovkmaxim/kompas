<?php

/**
 * This is the model class for table "km_competition_request".
 *
 * The followings are the available columns in table 'km_competition_request':
 * @property string $id
 * @property string $competition_id
 * @property string $group_id
 * @property string $name
 * @property string $lastname
 * @property string $year
 * @property string $chip
 * @property string $dyusch
 * @property string $sity
 * @property string $coutry
 * @property string $team
 * @property string $coach
 * @property string $fst
 * @property string $participation_data
 * @property string $status
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property KmCompetition $competition
 * @property KmGroup $group
 * @property KmUser $user
 * @property KmRank[] $kmRanks
 */
class CompetitionRequest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'km_competition_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('competition_id, group_id, name, lastname, year, chip, sity, coutry,  participation_data', 'required' ),	
                        array('competition_id, group_id, status, user_id', 'length', 'max'=>10),
			array('name, lastname, chip, dyusch, sity, coutry, team, coach, fst, participation_data', 'length', 'max'=>255),
			array('year', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, competition_id, group_id, name, lastname, year, chip, dyusch, sity, coutry, team, coach, fst, participation_data, status, user_id', 'safe', 'on'=>'search'),
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
			'competition' => array(self::BELONGS_TO, 'KmCompetition', 'competition_id'),
			'group' => array(self::BELONGS_TO, 'KmGroup', 'group_id'),
			'user' => array(self::BELONGS_TO, 'KmUser', 'user_id'),
			'kmRanks' => array(self::MANY_MANY, 'KmRank', 'km_rank_has_km_competition_request(competition_request_id, rank_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'competition_id' => 'Competition',
			'group_id' => 'Group',
			'name' => 'Name',
			'lastname' => 'Lastname',
			'year' => 'Year',
			'chip' => 'Chip',
			'dyusch' => 'Dyusch',
			'sity' => 'Sity',
			'coutry' => 'Coutry',
			'team' => 'Team',
			'coach' => 'Coach',
			'fst' => 'Fst',
			'participation_data' => 'Participation Data',
			'status' => 'Status',
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
		$criteria->compare('competition_id',$this->competition_id,true);
		$criteria->compare('group_id',$this->group_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('chip',$this->chip,true);
		$criteria->compare('dyusch',$this->dyusch,true);
		$criteria->compare('sity',$this->sity,true);
		$criteria->compare('coutry',$this->coutry,true);
		$criteria->compare('team',$this->team,true);
		$criteria->compare('coach',$this->coach,true);
		$criteria->compare('fst',$this->fst,true);
		$criteria->compare('participation_data',$this->participation_data,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CompetitionRequest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
                
        public function getAllGroupName(){
            $name = Group::model()->findAll();
            $all_names[0] = "";
            foreach ($name as $names){
                $all_names[$names->id] = $names->name;
            }            
            return $all_names;
        }
        
}
