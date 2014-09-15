<?php
/* @var $this CompetitionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Тренировка',
);

?>

<h1>Тренировка</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
        'pager'=>array(
                'header'         => '',
                'firstPageLabel' => '&lt;&lt;',
                'prevPageLabel'  => '<img src="images/pagination/left.png">',
                'nextPageLabel'  => '<img src="images/pagination/right.png">',
                'lastPageLabel'  => '&gt;&gt;',
         ),
        'template'=>'{pager}{items}{pager}',
	'itemView'=>'_viewtraining',
)); ?>
