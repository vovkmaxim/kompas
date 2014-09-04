<?php
/* @var $this PhotoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Фото',
);

?>

<h1>Фото</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
