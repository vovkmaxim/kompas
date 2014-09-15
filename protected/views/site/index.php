<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<ul class="no-bullet">
<?php 

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
        'template'=>'{pager}{items}{pager}',
	'itemView'=>'_view',
)); 
?>
</ul>

        