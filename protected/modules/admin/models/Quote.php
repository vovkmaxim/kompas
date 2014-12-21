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
			array('quote', 'safe'),
			array('quote, author_quote', 'required'),
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
			'id' => '№ ID',
			'quote' => 'Цитата',
			'author_quote' => 'Автор цитаты',
			'create_date' => 'Дата создания',
			'update_date' => 'Дата изменения',
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
                $criteria->order = 'id DESC';
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
        
        public function beforeSave() {
            if ($this->isNewRecord){
                $this->create_date = date('Y-m-d H:i:s');
                $this->update_date = date('Y-m-d H:i:s');
            } else {
                $this->update_date = date('Y-m-d H:i:s');
            }                

            return parent::beforeSave();
        }


//        private function afterSave() {
//            parent::afterSave();
////            parent::beforeSave();            
//            $this->create_date = date('Y-m-d H:i:s');
//            $this->update_date = date('Y-m-d H:i:s');
//        }
}
