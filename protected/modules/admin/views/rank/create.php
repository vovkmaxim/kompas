<?php
/* @var $this RankController */
/* @var $model Rank */

$this->breadcrumbs=array(
	'Разряды'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Создать разряд</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>