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
                        array('title, description, type, text, start_data, start_time, end_data, end_time, close_registration_data, close_registration_time, enable_registration_flag,  archive', 'required'),
			array('enable_registration_flag, archive', 'numerical', 'integerOnly'=>true),
                        array('logo_desc','file','types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true,'on'=>'insert,update'),
			array('type', 'length', 'max'=>10),
			array('text, create_date, update_date, start_data, start_time, end_data, end_time, close_registration_data, close_registration_time', 'safe'),
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
			'Comments' => array(self::HAS_MANY, 'Comments', 'competition_id'),
			'Groups' => array(self::MANY_MANY, 'Group', 'km_competition_group_refs(km_competition_id, km_group_id)'),
			'CompetitionRequests' => array(self::HAS_MANY, 'CompetitionRequest', 'competition_id'),
			'Files' => array(self::HAS_MANY, 'File', 'competition_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Заголовок',
			'description' => 'Краткое описание',
			'type' => 'Укажите тип события',
			'logo_desc' => 'Логотип',
			'text' => 'Текс',
			'create_date' => 'Дата создания',
			'update_date' => 'Дата обновления',
			'start_data' => 'Дата проведения',
			'start_time' => 'Время начала',
			'end_data' => 'Дата окончания',
			'end_time' => 'Время окончания',
			'close_registration_data' => 'Дата окончания регистрации',
			'close_registration_time' => 'Время окончания регистрации',
			'enable_registration_flag' => 'Онлайн регистрация заявок',
			'position' => 'Позиция',
			'archive' => 'В архив событий',
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
        
                
        public function beforeSave() {
            if(!parent::beforeSave())
                return false;
            if(($this->scenario=='insert' || $this->scenario=='update') &&
                ($document=CUploadedFile::getInstance($this,'logo_desc'))){
                $this->deleteDocument(); // старый документ удалим, потому что загружаем новый

                $this->logo_desc=$document;
                $this->logo_desc->saveAs(
                    Yii::getPathOfAlias('webroot.logo_competition').DIRECTORY_SEPARATOR.$this->logo_desc);
            }
            if ($this->isNewRecord){
                $this->create_date = date('Y-m-d H:i:s');
                $this->update_date = date('Y-m-d H:i:s');
            } else {
                $this->update_date = date('Y-m-d H:i:s');
            }                

            return parent::beforeSave();
        }
        
        protected function beforeDelete(){
            if(!parent::beforeDelete())
                return false;
            $this->deleteDocument(); // удалили модель? удаляем и файл
            return true;
        }
        
        public function deleteDocument(){
            $documentPath=Yii::getPathOfAlias('webroot.logo_competition').DIRECTORY_SEPARATOR.
                $this->logo_desc;
            if(is_file($documentPath))
                unlink($documentPath);
        }
        
        
        
        public function getYearInput($name, $atribut){
            if(!empty($this->$atribut)){
                $atribut = explode("-",$this->$atribut);
                
                return '<input type="text" value="' . $atribut[0] . '" name="' . $name . '" style="width: 50px;" maxlength="4" /> ';
            } else {
                return '<input type="text" name="' . $name . '" style="width: 50px;" maxlength="4" /> ';
            }
        }
        
        public function getDataList($name_list, $atribut,$langht,$indexValye){
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
        
        public function getHourList($name_list, $atribut){
           if(!empty($this->$atribut)){
                $atribut = explode(":",$this->$atribut);
                $hourList = '<select name="' . $name_list . '" style="width: 50px;" size="1">';
                $hours = $this->numbers;
                
                for($i = 1; $i <= 24; $i++){
                    if($hours[$i] == $atribut[0]){
                        $hourList .= '<option  selected="selected" value="'. $hours[$i] .'">'. $hours[$i] .'</option>';
                    } else {
                        $hourList .= '<option value="'. $hours[$i] .'">'. $hours[$i] .'</option>';
                    }
                }
                $hourList .= '</select>';
                return $hourList;                 
            } else {
                $hourList = '<select name="' . $name_list . '" style="width: 50px;" size="1">';
                $hourList .= '<option  selected="selected" value="0">   </option>';
                $hours = $this->numbers;
                for($i = 1; $i <= 24; $i++){
                        $hourList .= '<option value="'. $hours[$i] .'">'. $hours[$i] .'</option>';
                }
                $hourList .= '</select>';
                return $hourList; 
            }
        }
        
        
        public function getGroupCompetitionFormCheckbox(){
            $group = Group::model()->findAll();
            if($group != NULL){
                $COUNT_GROUP = count($group);
                $group_string = '';
                if(!empty($this->Groups)){
                    for( $i=0; $i < $COUNT_GROUP; $i++ ){
                        if($this->chekGroupForCompetition($group[$i]->id)){
                            $group_string .= '<input type="checkbox" name="grop_' . $group[$i]->id . '" value="' . $group[$i]->id . '" checked  >' . $group[$i]->name . '<br>';
                        } else {
                            $group_string .= '<input type="checkbox" name="grop_' . $group[$i]->id . '" value="' . $group[$i]->id . '">' . $group[$i]->name . '<br>';
                        }                        
                    }
                    return $group_string;                    
                } else {                    
                    for( $i=0; $i < $COUNT_GROUP; $i++ ){
                        $group_string .= '<input type="checkbox" name="grop_' . $group[$i]->id . '" value="' . $group[$i]->id . '">' . $group[$i]->name . '<br>';
                    }
                    return $group_string;
                }                
            } else {
                return 0;
            }
        }
        
        private function chekGroupForCompetition($grop_id){
            $THIS_GROUP = $this->Groups;
            $lenght_this_group = count($THIS_GROUP);
            for( $i=0; $i < $lenght_this_group; $i++ ){
                if($THIS_GROUP[$i]->id == $grop_id){
                    return TRUE;
                }
            }
            return FALSE;
        }
        
        public function getTypeList(){
            if($this->type == 1){
                return "<h4><span  style='color:#0000CD'>Тренеровка</span></h4>";
            } 
            
            if($this->type == 2){
                return "<h4><span  style='color:#FF0000'>Соревнования</span></h4>";    
            } 
            
        }
        
        public function getLogoImage(){
            
            if(!empty($this->logo_desc)){
                return '<img width="147" height="115" alt="logo" src="/logo_competition/'. $this->logo_desc . '">';
            } else {
                return 'Логотип отсутствует';
            }
         }
        
        public function getCommentCount(){
            $comment = Comments::model()->findAll('competition_id=:id', array(':id' => $this->id));
            if($comment != NULL){
                return count($comment);
            } else {
                return 0;
            }
        }
        
        public function getCountRequest(){
            $comment = CompetitionRequest::model()->findAll('competition_id=:id', array(':id' => $this->id));
            if($comment != NULL){
                return count($comment);
            } else {
                return 0;
            }
        }
        
        public function getFileForThisCompetition(){
            $files = File::model()->findAll('competition_id=:id', array(':id' => $this->id));
            $retun_string = '';
            if(!empty($files)){
                foreach ($files as $file){  
                    $retun_string .= '<p><a target="_blank" href="/media/';
                    $retun_string .= $file->path;   
                    $retun_string .= '">';   
                    $retun_string .= $file->name; 
                    $retun_string .= '</a></p>'; 
                } 
            }
             return $retun_string;
        }
         public function getAllGroupName(){
            $name = Group::model()->findAll();
            $all_names = '<select style="min-width: 50px; max-width: 100px;" id="group_id" name="group_id" 0="">';
            $all_names .= '<option value="0"></option>';
            foreach ($name as $names){
                $all_names .= '<option value="';
                $all_names .= $names->id;
                $all_names .= '">';
                $all_names .= $names->name;
                $all_names .= '</option>';
            }      
             $all_names .= '</select> ';
            return $all_names;
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
}
