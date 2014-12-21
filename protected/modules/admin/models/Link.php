<?php

/**
 * This is the model class for table "km_link".
 *
 * The followings are the available columns in table 'km_link':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $path
 * @property string $logo
 */
class Link extends CActiveRecord
{
    
	public function tableName()
	{
		return 'km_link';
	}

	public function rules()
	{
		return array(
			array('name, description', 'length', 'max'=>255),
			array('name, description,path', 'required'),
                        array('logo','file','types'=>'jpg, jpeg, gif, png, bmp', 'allowEmpty'=>true,'on'=>'insert,update' , 'maxSize' => 1009048576),
			array('path', 'safe'),
			array('id, name, description, path', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
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
			'description' => 'Описание',
			'path' => 'Путь(Ссылка)',
			'logo' => 'logo',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('logo',$this->logo,true);
                $criteria->order = 'id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
               
        
                
        public function getImage(){    
            return '<img src="/links_images/thromb/' . $this->logo . '"  width="147" height="115" alt="' . $this->name . '">';
        }
                
        protected function beforeSave(){
            if(!parent::beforeSave())
                return false;
            if(($this->scenario=='insert' || $this->scenario=='update') &&
                ($document=CUploadedFile::getInstance($this,'logo'))){
                $this->deleteDocument(); 
                $this->logo=$document;
                $this->logo->saveAs(
                    Yii::getPathOfAlias('webroot.links_images').DIRECTORY_SEPARATOR.$this->logo);
                $this->img_resize(Yii::getPathOfAlias('webroot.links_images').DIRECTORY_SEPARATOR.$this->logo,
                        Yii::getPathOfAlias('webroot.links_images.thromb').DIRECTORY_SEPARATOR.$this->logo,
                        147, 115, '0xFFFFFF', 100);
            }
            return true;
        }
        
        
        protected function beforeDelete(){
            if(!parent::beforeDelete())
                return false;
            $this->deleteDocument();
            return true;
        }
        
        public function deleteDocument(){
            $documentPath=Yii::getPathOfAlias('webroot.links_images').DIRECTORY_SEPARATOR.$this->logo;
            if(is_file($documentPath))
                unlink($documentPath);
            $documentPath=Yii::getPathOfAlias('webroot.links_images.thromb').DIRECTORY_SEPARATOR.$this->logo;
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
