<?php

/**
 * This is the model class for table "km_banners".
 *
 * The followings are the available columns in table 'km_banners':
 * @property string $id
 * @property string $name
 * @property string $position
 * @property string $link
 * @property string $path
 */
class Banners extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'km_banners';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>255),
			array('position', 'length', 'max'=>10),
			array('link, path', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, position, link, path', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'position' => 'Position',
			'link' => 'Link',
			'path' => 'Path',
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
		$criteria->compare('position',$this->position,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('path',$this->path,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Banners the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function getAllBanners(){
            $banners = Banners::model()->findAll();
            if($banners != NULL){
//                $return_string_images = '<ul class="no-bullet small-block-grid-4 large-block-grid-1">';
                $return_string_images = '';
                foreach ($banners as $banner){
                    
//                    $return_string_images .= '<li>';
                    $return_string_images .= '
                        
                        <a href="' . $banner->link . '">
                            <img src="banners/' . $banner->path . '" 
                                width="115" height="100" alt="' . $banner->name . '">
                        </a>
                        ';
                    
//                    $return_string_images .= '</li>';
                    
                }
//                $return_string_images .= '</ul>';
                return $return_string_images;
            }
        }
        
}
