<?php
/* @var $this EventsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Новости',
);

?>
<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
        <script type="text/javascript">
		$(document).ready(function() {
                        $(".fancybox").fancybox({
                                openEffect	: 'none',
                                closeEffect	: 'none'
                        });
                });
	</script>
<h1>Новости</h1>

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
	'itemView'=>'_viewnews',
)); ?>
