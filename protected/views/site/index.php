<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<ul class="no-bullet">
<?php 

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
        'pager'=>array(
                'header'         => '',
                'firstPageLabel' => '&lt;&lt;',
                'prevPageLabel'  => '<img src="images/pagination/left.png">',
                'nextPageLabel'  => '<img src="images/pagination/right.png">',
                'lastPageLabel'  => '&gt;&gt;',
         ),
        'template'=>'{pager}{items}{pager}',
	'itemView'=>'_view',
)); 
?>
</ul>

        