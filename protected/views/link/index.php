<?php
/* @var $this LinkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cсылки',
);
?>
<h1>Интересные ссылки:</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
