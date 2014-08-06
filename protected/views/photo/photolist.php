<?php
/* @var $this PhotoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Photos',
);

?>

<h1>Photos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewphoto',
)); ?>


        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
        <script type="text/javascript">
		$(document).ready(function() {
			
			$('.fancybox').fancybox();

		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>