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
    public $path;


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
                        array('path','file','types'=>'jpg, jpeg, gif, png, bmp', 'allowEmpty'=>true,'on'=>'insert,update' , 'maxSize' => 1009048576),
			array('link', 'safe'),
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
			'name' => 'Имя',
			'position' => 'Position',
			'link' => 'Ссылка',
			'path' => 'Картинка',
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
                $criteria->order = 'id DESC';
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
        
        public function getBannerImage(){    
//            return '<img src="'.Yii::app()->basePath. '/banners/' . $this->id . '_assortiment.jpg"  width="147" height="115" alt="' . $this->name . '">';
            return '<img src="/banners/thromb/' . $this->path . '"  width="147" height="115" alt="' . $this->name . '">';
        }
                
        protected function beforeSave(){
            if(!parent::beforeSave())
                return false;
            if(($this->scenario=='insert' || $this->scenario=='update') &&
                ($document=CUploadedFile::getInstance($this,'path'))){
                $this->deleteDocument(); // старый документ удалим, потому что загружаем новый

                $this->path=$document;
                $this->path->saveAs(
                    Yii::getPathOfAlias('webroot.banners').DIRECTORY_SEPARATOR.$this->path);
                $this->img_resize(Yii::getPathOfAlias('webroot.banners').DIRECTORY_SEPARATOR.$this->path,
                        Yii::getPathOfAlias('webroot.banners.thromb').DIRECTORY_SEPARATOR.$this->path,
                        105, 95, '0xFFFFFF', 100);
            }
            return true;
        }
        
        
        protected function beforeDelete(){
            if(!parent::beforeDelete())
                return false;
            $this->deleteDocument(); // удалили модель? удаляем и файл
            return true;
        }
        
        public function deleteDocument(){
            $documentPath=Yii::getPathOfAlias('webroot.banners').DIRECTORY_SEPARATOR.
                $this->path;
            if(is_file($documentPath))
                unlink($documentPath);
            $documentPath=Yii::getPathOfAlias('webroot.banners.thromb').DIRECTORY_SEPARATOR.$this->path;
            if(is_file($documentPath))
                unlink($documentPath);
        }
               
        public function img_resize($src, $dest, $width, $height, $rgb = 0xFFFFFF, $quality = 100) {  
                    if (!file_exists($src)) {  
                        return false;  
                    }  
                    $size = getimagesize($src);   
                    if ($size === false) {  
                        return false;  
                    }   
                    $format = strtolower(substr($size['mime'], strpos($size['mime'], '/') + 1));  
                    $icfunc = 'imagecreatefrom'.$format;  
                    if (!function_exists($icfunc)) {  
                        return false;  
                    }   
                    $x_ratio = $width  / $size[0];  
                    $y_ratio = $height / $size[1]; 
                    if ($height == 0) {   
                        $y_ratio = $x_ratio;  
                        $height  = $y_ratio * $size[1];   
                    } elseif ($width == 0) {   
                        $x_ratio = $y_ratio;  
                        $width   = $x_ratio * $size[0];   
                    }   
                    $ratio       = min($x_ratio, $y_ratio);  
                    $use_x_ratio = ($x_ratio == $ratio);   
                    $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);  
                    $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);  
                    $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width)   / 2);  
                    $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);  
                    $isrc  = $icfunc($src);  
                    $idest = imagecreatetruecolor($width, $height);   
                    imagefill($idest, 0, 0, $rgb);   
                    imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, $new_width, $new_height, $size[0], $size[1]);  
                    imagejpeg($idest, $dest, $quality); 
                    imagedestroy($isrc);  
                    imagedestroy($idest);   
                    return true;  
        }
        
}
