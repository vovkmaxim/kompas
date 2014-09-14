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
        'pager'=>array(
                'header'         => '',
                'firstPageLabel' => '&lt;&lt;',
                'prevPageLabel'  => '<img src="images/pagination/left.png">',
                'nextPageLabel'  => '<img src="images/pagination/right.png">',
                'lastPageLabel'  => '&gt;&gt;',
            ),
            'template'=>'{pager}{items}{pager}',
        //    'columns'=>$arrayColumns,
	'itemView'=>'_viewgroup',
)); ?>
