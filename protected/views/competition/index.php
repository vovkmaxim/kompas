<?php
/* @var $this CompetitionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Соревнования',
);

?>

<h1>Соревнования</h1>

<?php 


$this->widget('zii.widgets.CListView', array(
    'id'=>'My-grid',
    'dataProvider'=>$dataProvider,
    'pager'=>array(
        'header'         => '',
        'firstPageLabel' => '&lt;&lt;',
        'prevPageLabel'  => '<img src="images/pagination/left.png">',
        'nextPageLabel'  => '<img src="images/pagination/right.png">',
        'lastPageLabel'  => '&gt;&gt;',
    ),
    'template'=>'{pager}{items}{pager}',
//    'columns'=>$arrayColumns,
    'itemView'=>'_view',
));



//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//));


?>
