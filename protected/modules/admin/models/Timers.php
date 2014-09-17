<?php

/**
 * This is the model class for table "km_timers".
 *
 * The followings are the available columns in table 'km_timers':
 * @property integer $id
 * @property integer $status
 * @property string $timer_date
 * @property string $titles
 */
class Timers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'km_timers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, timer_date, titles', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('timer_date, titles', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, status, timer_date, titles', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status' => 'Статус',
			'timer_date' => 'Дата таймер',
			'titles' => 'Заголовок события',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('status',$this->status);
		$criteria->compare('timer_date',$this->timer_date,true);
		$criteria->compare('titles',$this->titles,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Timers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function get_status(){
            if($this->status){
                return "<span  style='color:#00FF66'>Aктивирован</span>";
            } else {
                 return "<span  style='color:red'>Не активирован</span>";
            }
        }
        
        public function get_status_this_list(){
            
            $return_list = '<select name="Timers[status]" id="Timers_status">';
            if($this->status){
                $return_list .= '<option value="0">Не aктивирован</option>';
                    
                $return_list.= '<option selected value="1">Активирован</option>';
            } else {
                $return_list .= '<option selected value="0">Не aктивирован</option>';
                    
                $return_list.= '<option value="1">Активирован</option>'
                        . '</select>';
            }
            return $return_list;
        }
}
