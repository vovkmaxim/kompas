<?php
/* @var $this GroupPhotoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Группы фото',
);

?>

<h1>Группы фото</h1>
<div class="group_photo_conteiner">
    <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'pager'=>array(
                    'header'         => '',
                    'lastPageLabel'  => '&gt;&gt;',
                ),
                'template'=>'{pager}{items}{pager}',
            'itemView'=>'_viewgroup',
    )); ?>
</div>