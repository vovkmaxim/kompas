<?php
/* @var $this GroupPhotoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Группы фото',
);

?>

<h1>Группы фото</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewgroup',
)); ?>
