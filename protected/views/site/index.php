<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<ul class="no-bullet">
<?php 

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
?>
</ul>

        