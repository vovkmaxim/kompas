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
    
        
    private $numbers = array(
        1 => '01',
        2 => '02',
        3 => '03',
        4 => '04',
        5 => '05',
        6 => '06',
        7 => '07',
        8 => '08',
        9 => '09',
        10 => '10',
        11 => '11',
        12 => '12',
        13 => '13',
        14 => '14',
        15 => '15',
        16 => '16',
        17 => '17',
        18 => '18',
        19 => '19',
        20 => '20',
        21 => '21',
        22 => '22',
        23 => '23',
        24 => '24',
        25 => '25',
        26 => '26',
        27 => '27',
        28 => '28',
        29 => '29',
        30 => '30',
        31 => '31',
    );
    
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

//			array('competition_id, group_id, name, lastname, year, sity, fst, team, coutry,  participation_data', 'required' ),	
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
			'group_id' => 'Группа',
			'name' => 'Имя',
			'lastname' => 'Фамилия',
			'year' => 'Год рождения',
			'chip' => 'ЧИП№',
			'dyusch' => 'ДЮСШ',
			'sity' => 'Город',
			'coutry' => 'Страна',
			'team' => 'Команда',
			'coach' => 'Тренер',
			'fst' => 'ФСТ',
			'participation_data' => 'Старты',
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
        
        public function getChekData($id){
            $competition_data = Competition::model()->findByPk($id);
            if($competition_data != NULL){
                $datetime1 = new DateTime($competition_data->start_data);
                $datetime2 = new DateTime($competition_data->end_data);
                $interval = $datetime1->diff($datetime2);
                $lenght_data = $interval->days;
                $start_data = explode("-", $competition_data->start_data);
                $sring_data = '';
                $array_data = array();
                
                if($lenght_data > 1){
                    for($i = 0; $i < $lenght_data-1; $i++){
                        $array_data[] = $start_data[0] . '-' . $start_data[1] . '-' . ($start_data[2] + $i);
                    }
                } else {
                    for($i = 0; $i < $lenght_data; $i++){
                        $array_data[] = $start_data[0] . '-' . $start_data[1] . '-' . ($start_data[2] + $i);
                    }
                }
                
                $lenght_data = count($array_data);
                for($i = 0; $i < $lenght_data; $i++){
                    $sring_data .= '<input type="checkbox" name="check_data[' . $i . ']" value="' . $array_data[$i] . '">' . $array_data[$i] . '<br>';
                }
                return $sring_data;
            } else {
                return false;
            }    
        }
        
        /**
         * 
         * @param type $name
         * @param type $atribut
         * @return string 
         */
        public function getYearInput($name = 'year_bird', $atribut = 'year'){
            if(!empty($this->$atribut)){
                $atribut = explode("-",$this->$atribut);
                return '<input type="text" value="' . $atribut[0] . '" name="' . $name . '" style="width: 50px;" maxlength="4" /> ';
            } else {
                return '<input type="text" name="' . $name . '" style="width: 50px;" maxlength="4" /> ';
            }
        }
        
        /**
         * 
         * @param STRING $name_list  name list teg in html form STRING
         * @param STRING $atribut its year birdays users for this request STRING
         * @param INTEGER $langht lenght for Days OR Monts 
         * @param STRING $indexValye this Day or Monts value STRING
         * @return string
         */
        public function getDataList($name_list, $atribut = 'year',$langht,$indexValye){
            if(!empty($this->$atribut)){
                $atribut = explode("-",$this->$atribut);
                $montsList = '<select name="' . $name_list . '" style="width: 50px;" size="1">';
                $monts = $this->numbers;
                if($indexValye == "Day"){
                    $index = $atribut[2];
                } elseif($indexValye == "Monts"){
                    $index = $atribut[1];
                }
                for($i = 1; $i <= $langht; $i++){
                    if($monts[$i] == $index){
                        $montsList .= '<option  selected="selected" value="'. $monts[$i] .'">'. $monts[$i] .'</option>';
                    } else {
                        $montsList .= '<option value="'. $monts[$i] .'">'. $monts[$i] .'</option>';
                    }
                }
                $montsList .= '</select>';
                return $montsList;                 
            } else {
                $montsList = '<select name="' . $name_list . '" style="width: 50px;" size="1">';
                $montsList .= '<option  selected="selected" value="0">   </option>';
                $monts = $this->numbers;
                for($i = 1; $i <= $langht; $i++){
                        $montsList .= '<option value="'. $monts[$i] .'">'. $monts[$i] .'</option>';
                }
                $montsList .= '</select>';
                return $montsList; 
            }
        }
        
        
        public function getRanksList(){
            $rank = Rank::model()->findAll();       
            if($rank != NULL){
                $rankList = '<select name="rank" style="width: 50px;" size="1">';
                $rankList .= '<option  selected="selected" value="0">   </option>';
                $prom_rank = RankHasCompetitionRequest::model()->findAll('competition_request_id=:id',array(':id' => $this->id));
                if($prom_rank != NULL){
                    foreach ($rank as $ranks){
                        if($ranks->id == $prom_rank[0]->rank_id){
                            $rankList .= '<option selected="selected" value="'. $ranks->id .'">'. $ranks->name .'</option>';
                        } else {
                            $rankList .= '<option value="'. $ranks->id .'">'. $ranks->name .'</option>';
                        }
                    }
                } else {
                    foreach ($rank as $ranks){
                        $rankList .= '<option value="'. $ranks->id .'">'. $ranks->name .'</option>';
                    }
                }                
                $rankList .= '</select>';
                return $rankList; 
            }
        }
        
        public function getRankName(){
            $prom_rank = RankHasCompetitionRequest::model()->findAll('competition_request_id=:id',array(':id' => $this->id));
            if(!empty($prom_rank)){
                $rank = Rank::model()->findAll('id=:rank_id',array(':rank_id'=>$prom_rank[0]->rank_id));
                return $rank[0]->name;
            }
        }
        
        public function getGroupName(){
            $group = Group::model()->findByPk($this->group_id);
            if($group != NULL){
                return $group->name;
            } else {
                return false;
            }
        }
        
        public function getCompetitionTitle(){
            $competition = Competition::model()->findByPk($this->competition_id);
            if($competition != NULL){
//                return CHtml::link($competition->title, array('competition/view', 'id'=>$this->competition_id));
                return '<a href="/index.php?r=competition/view&id=' . $this->competition_id . '" >' . $competition->title . '</a>';
            } else {
                return false;
            }
        }
        
        public function getNameStatus(){
            if($this->status == 0){
                return "<span  style='color:red'>Ожидает</span>";
            }
            
            if($this->status == 1){
                return "<span  style='color:#00FF66'>Принята</span>";
            }
        }
        
        public function getNameStatusPrint(){
            if($this->status == 0){
                return "Не активирован";
            }
            
            if($this->status == 1){
                return "Aктивирован";
            }
        }
        
        //  admin/user/view&id=3
        
        public function getNameUserPrint(){
            $user =User::model()->findByPk($this->user_id);
            if($user != NULL){
                return $user->name;
            }
        }
        public function getNameUser(){
            $user =User::model()->findByPk($this->user_id);
            if($user != NULL){
                return $user->username;
//                return CHtml::link($user->name, array('user/view', 'id'=>$user->id));
            }
        }
        
        public function groupDropDownList(){
            $return_list = '<select name="group_id" size="1">';
            $group_name_list = $this->getAllGroupName();
            foreach ($group_name_list as $k => $value){
                if($this->group_id){
                    $return_list .= '<option selected="selected" value="' . $k . '">' . $value . '</option>';
                } else {
                    $return_list .= '<option value="' . $k . '">' . $value . '</option>';
                }
            }
            $return_list .= '</select>';
            return $return_list;
        }
        
        
}
