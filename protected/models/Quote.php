<?php

/**
 * This is the model class for table "km_quote".
 *
 * The followings are the available columns in table 'km_quote':
 * @property string $id
 * @property string $quote
 * @property string $author_quote
 * @property string $create_date
 * @property string $update_date
 */
class Quote extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'km_quote';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author_quote', 'length', 'max'=>255),
			array('quote, create_date, update_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, quote, author_quote, create_date, update_date', 'safe', 'on'=>'search'),
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
			'quote' => 'Quote',
			'author_quote' => 'Author Quote',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
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
		$criteria->compare('quote',$this->quote,true);
		$criteria->compare('author_quote',$this->author_quote,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Quote the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getRandQuote(){
            $all_quote_id = $this->getAllQuoteID();
            if($all_quote_id){
                $max_quote_id = $this->getMaxQuoteID($all_quote_id);
                $min_quote_id = $this->getMinQuoteID($all_quote_id);
                return Quote::model()->findByPk(rand($min_quote_id, $max_quote_id));
            }
        }
        
        private function getAllQuoteID(){
            $quote = Quote::model()->findAll();
            $id_mass = array();
            if($quote != NULL){
                foreach ($quote as $quotes){
                    $id_mass[] = $quotes->id;
                }
                return $id_mass;
            } else {
                return false;
            }
            
        }

        private function getMaxQuoteID($all_quote_id){
            $lenght = count($all_quote_id);
            $min = $all_quote_id[0];
            for($i=0; $i < $lenght; $i++){
                if($all_quote_id[$i] < $min){
                    $min = $all_quote_id[$i];
                }
            }
            return $min;
        }
        
        private function getMinQuoteID($all_quote_id){
            $lenght = count($all_quote_id);
            $max = $all_quote_id[0];
            for($i=0; $i < $lenght; $i++){
                if($max < $all_quote_id[$i]){
                    $max = $all_quote_id[$i];
                }
            }
            return $max;
        }
        
}
